<?php

namespace App\Filament\Admin\Resources\Leads\Pages;

use App\Filament\Admin\Resources\Leads\LeadResource;
use App\Models\Lead;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ListLeads extends ListRecords
{

    protected static string $resource = LeadResource::class;

    protected string $view = 'filament.admin.resources.leads.pages.list-leads';

    public string $search = '';
    public string $statusFilter = 'all';
    public string $sourceFilter = 'all';
    public string $sortOrder = 'desc';

    public ?Lead $activeLead = null;
    public ?int $noteLeadId = null;
    public string $noteText = '';
    public bool $showDetailsModal = false;
    public bool $showNotesModal = false;

    // Bulk selection & Delete confirmation modal
    public array $selectedLeads = [];
    public bool $selectAll = false;
    public bool $showDeleteModal = false;
    public ?int $leadToDeleteId = null;
    public bool $isBulkDelete = false;

    protected $queryString = [
        'search' => ['except' => ''],
        'statusFilter' => ['except' => 'all'],
        'sourceFilter' => ['except' => 'all'],
        'sortOrder' => ['except' => 'desc'],
    ];

    public function updatingSearch(): void
    {
        $this->selectedLeads = [];
        $this->selectAll = false;
        $this->resetPage();
    }

    public function updatingStatusFilter(): void
    {
        $this->selectedLeads = [];
        $this->selectAll = false;
        $this->resetPage();
    }

    public function updatingSourceFilter(): void
    {
        $this->selectedLeads = [];
        $this->selectAll = false;
        $this->resetPage();
    }

    public function filterByStatus(string $status): void
    {
        $this->statusFilter = $status;
        $this->selectedLeads = [];
        $this->selectAll = false;
        $this->resetPage();
    }

    public function updatedSelectAll(bool $value): void
    {
        if ($value) {
            $this->selectedLeads = $this->leads->pluck('id')->map(fn ($id) => (string) $id)->toArray();
        } else {
            $this->selectedLeads = [];
        }
    }

    public function deselectAll(): void
    {
        $this->selectedLeads = [];
        $this->selectAll = false;
    }

    public function bulkUpdateStatus(string $status): void
    {
        if (empty($this->selectedLeads)) {
            return;
        }

        Lead::whereIn('id', $this->selectedLeads)->update(['status' => $status]);
        $count = count($this->selectedLeads);
        $this->selectedLeads = [];
        $this->selectAll = false;

        Notification::make()
            ->title("Updated {$count} inquiries to " . ucfirst($status))
            ->success()
            ->send();
    }

    public function confirmBulkDelete(): void
    {
        if (empty($this->selectedLeads)) {
            return;
        }
        $this->leadToDeleteId = null;
        $this->isBulkDelete = true;
        $this->showDeleteModal = true;
    }

    public function confirmSingleDelete(int $leadId): void
    {
        $this->leadToDeleteId = $leadId;
        $this->isBulkDelete = false;
        $this->showDeleteModal = true;
    }

    public function cancelDelete(): void
    {
        $this->showDeleteModal = false;
        $this->leadToDeleteId = null;
        $this->isBulkDelete = false;
    }

    public function executeDelete(): void
    {
        if ($this->isBulkDelete) {
            $count = count($this->selectedLeads);
            Lead::whereIn('id', $this->selectedLeads)->delete();
            $this->selectedLeads = [];
            $this->selectAll = false;

            Notification::make()
                ->title("Successfully deleted {$count} customer inquiries")
                ->success()
                ->send();
        } elseif ($this->leadToDeleteId) {
            $lead = Lead::find($this->leadToDeleteId);
            if ($lead) {
                $lead->delete();
                Notification::make()
                    ->title("Inquiry #{$this->leadToDeleteId} deleted successfully")
                    ->success()
                    ->send();
            }
        }

        $this->cancelDelete();
    }

    public function updateLeadStatus(int $leadId, string $status): void
    {
        $lead = Lead::find($leadId);
        if ($lead) {
            $lead->update(['status' => $status]);
            Notification::make()
                ->title("Inquiry #{$leadId} status updated to " . ucfirst($status))
                ->success()
                ->send();
        }
    }

    public function openDetails(int $leadId): void
    {
        $this->activeLead = Lead::find($leadId);
        $this->showDetailsModal = true;
    }

    public function closeDetails(): void
    {
        $this->showDetailsModal = false;
        $this->activeLead = null;
    }

    public function openNotes(int $leadId): void
    {
        $lead = Lead::find($leadId);
        if ($lead) {
            $this->noteLeadId = $lead->id;
            $this->noteText = (string) $lead->admin_notes;
            $this->showNotesModal = true;
        }
    }

    public function closeNotes(): void
    {
        $this->showNotesModal = false;
        $this->noteLeadId = null;
        $this->noteText = '';
    }

    public function saveNotes(): void
    {
        if ($this->noteLeadId) {
            $lead = Lead::find($this->noteLeadId);
            if ($lead) {
                $lead->update(['admin_notes' => $this->noteText]);
                Notification::make()
                    ->title("Follow-up notes updated successfully")
                    ->success()
                    ->send();
            }
        }
        $this->closeNotes();
    }

    public function deleteSingleLead(int $leadId): void
    {
        $this->confirmSingleDelete($leadId);
    }

    public function exportCsv(): StreamedResponse
    {
        $leads = Lead::latest()->get();
        $fileName = 'voltiva_leads_' . date('Y_m_d_His') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$fileName}\"",
        ];

        return response()->stream(function () use ($leads) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['ID', 'Name', 'Phone', 'Email', 'Subject', 'Product Requirement', 'Message', 'Source', 'Status', 'Admin Notes', 'Date']);

            foreach ($leads as $lead) {
                fputcsv($handle, [
                    $lead->id,
                    $lead->name,
                    $lead->phone,
                    $lead->email,
                    $lead->subject,
                    $lead->product_name,
                    $lead->message,
                    $lead->source,
                    $lead->status,
                    $lead->admin_notes,
                    $lead->created_at?->format('Y-m-d H:i:s'),
                ]);
            }
            fclose($handle);
        }, 200, $headers);
    }

    public function getLeadsProperty()
    {
        $query = Lead::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', "%{$this->search}%")
                  ->orWhere('phone', 'like', "%{$this->search}%")
                  ->orWhere('email', 'like', "%{$this->search}%")
                  ->orWhere('subject', 'like', "%{$this->search}%")
                  ->orWhere('product_name', 'like', "%{$this->search}%")
                  ->orWhere('message', 'like', "%{$this->search}%")
                  ->orWhere('admin_notes', 'like', "%{$this->search}%");
            });
        }

        if ($this->statusFilter && $this->statusFilter !== 'all') {
            $query->where('status', $this->statusFilter);
        }

        if ($this->sourceFilter && $this->sourceFilter !== 'all') {
            $query->where('source', $this->sourceFilter);
        }

        $direction = $this->sortOrder === 'oldest' ? 'asc' : 'desc';
        return $query->orderBy('created_at', $direction)->paginate(15);
    }
}
