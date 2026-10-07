<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class PageController extends Controller
{
    public function home()
    {
        $products = Product::latest()->take(6)->get();
        return view('index-3', compact('products'));
    }

    public function home2()
    {
        return view('index-2');
    }

    public function about()
    {
        return view('about');
    }

    public function blog()
    {
        return view('blog');
    }

    public function blogDetails()
    {
        $post = \App\Models\BlogPost::where('is_published', true)->latest()->first();
        return view('blog-details', compact('post'));
    }

    public function blogDetailsBySlug($slug)
    {
        $post = \App\Models\BlogPost::where('slug', $slug)->first();
        if (!$post) {
            $post = \App\Models\BlogPost::where('is_published', true)->latest()->first();
        }
        return view('blog-details', compact('post'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'cfName' => 'required|string|max:255',
            'cfEmail' => 'nullable|email|max:255',
            'cfPhone' => 'nullable|string|max:50',
            'cfSubject' => 'nullable|string|max:255',
            'cfMessage' => 'required|string|max:5000',
        ]);

        $subjectMap = [
            '1' => 'Business Strategy',
            '2' => 'Customer Experience',
            '3' => 'Sustainability and ESG',
            '4' => 'Training and Development',
            '5' => 'IT Support & Maintenance',
            '6' => 'Marketing Strategy',
        ];
        $rawSubject = $validated['cfSubject'] ?? null;
        if (isset($subjectMap[$rawSubject])) {
            $subject = $subjectMap[$rawSubject];
        } elseif (!empty($rawSubject) && $rawSubject !== '0') {
            $subject = $rawSubject;
        } else {
            $subject = 'General Website Inquiry';
        }

        $createdLead = \App\Models\Lead::create([
            'name' => $validated['cfName'],
            'email' => $validated['cfEmail'] ?? null,
            'phone' => $validated['cfPhone'] ?? null,
            'subject' => $subject,
            'product_name' => $subject,
            'message' => $validated['cfMessage'],
            'source' => 'Contact Page',
            'status' => 'new',
            'ip_address' => $request->ip(),
        ]);

        // ── Automated Email Notifications (Admin alert & Customer auto-reply) ──
        try {
            $leadName = $validated['cfName'];
            $leadEmail = $validated['cfEmail'] ?? null;
            $leadPhone = $validated['cfPhone'] ?? null;
            $leadMsg = $validated['cfMessage'];
            $brandName = setting('mail_from_name', 'Voltiva');
            $senderEmail = setting('mail_from_address', 'info@voltiva.com');

            // 1. Admin Alert Notification
            if (setting('mail_notify_admin_on_lead', '1') === '1' && !empty(setting('mail_host'))) {
                $recipientsRaw = setting('mail_admin_recipients', setting('contact_email', 'info@voltiva.com'));
                $recipients = array_filter(array_map('trim', explode(',', $recipientsRaw)));

                if (!empty($recipients)) {
                    \Illuminate\Support\Facades\Mail::html("
                        <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 24px; border: 1px solid #e4e4e7; border-radius: 12px; background: #ffffff;'>
                            <div style='padding-bottom: 16px; border-bottom: 2px solid #18181b; margin-bottom: 20px;'>
                                <div style='font-size: 11px; color: #71717a; text-transform: uppercase; font-weight: bold;'>New Website Lead Notification</div>
                                <h2 style='margin: 4px 0 0; color: #18181b; font-size: 20px;'>{$brandName} Leads Center</h2>
                            </div>
                            <div style='font-size: 13.5px; line-height: 1.6; color: #18181b;'>
                                <p><strong>Prospect Name:</strong> {$leadName}</p>
                                <p><strong>Phone:</strong> {$leadPhone}</p>
                                <p><strong>Email:</strong> {$leadEmail}</p>
                                <p><strong>Subject:</strong> {$subject}</p>
                                <div style='background: #f4f4f5; padding: 12px; border-radius: 8px; margin: 12px 0;'>
                                    <strong>Message:</strong><br>{$leadMsg}
                                </div>
                            </div>
                            <div style='margin-top: 20px; padding-top: 16px; border-top: 1px solid #e4e4e7;'>
                                <a href='tel:{$leadPhone}' style='display: inline-block; padding: 8px 16px; background: #18181b; color: #ffffff; text-decoration: none; border-radius: 6px; font-weight: bold; font-size: 12px; margin-right: 8px;'>📞 Call Prospect</a>
                                <a href='https://wa.me/" . preg_replace('/[^0-9]/', '', $leadPhone) . "' style='display: inline-block; padding: 8px 16px; background: #059669; color: #ffffff; text-decoration: none; border-radius: 6px; font-weight: bold; font-size: 12px;'>💬 WhatsApp Chat</a>
                            </div>
                        </div>
                    ", function ($message) use ($recipients, $brandName, $senderEmail, $subject, $leadName) {
                        $message->to($recipients)
                                ->from($senderEmail, $brandName)
                                ->subject("🔔 New Lead: {$leadName} - {$subject}");
                    });
                }
            }

            // 2. Customer Auto-Reply
            if (setting('mail_autoreply_customer', '1') === '1' && !empty($leadEmail) && !empty(setting('mail_host'))) {
                \Illuminate\Support\Facades\Mail::html("
                    <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 24px; border: 1px solid #e4e4e7; border-radius: 12px; background: #ffffff;'>
                        <div style='text-align: center; padding-bottom: 16px; border-bottom: 1px solid #e4e4e7; margin-bottom: 20px;'>
                            <h2 style='margin: 0; color: #18181b; font-size: 22px;'>{$brandName}</h2>
                            <div style='font-size: 12px; color: #71717a;'>Thank You For Reaching Out</div>
                        </div>
                        <p style='color: #27272a; font-size: 14px; line-height: 1.6;'>
                            Dear {$leadName},<br><br>
                            Thank you for contacting <strong>{$brandName}</strong>! We have successfully received your inquiry regarding <em>\"{$subject}\"</em>.
                        </p>
                        <p style='color: #27272a; font-size: 14px; line-height: 1.6;'>
                            Our technical sales and engineering team is reviewing your requirements and will connect with you within <strong>24 business hours</strong>.
                        </p>
                        <div style='background: #f4f4f5; padding: 14px; border-radius: 8px; font-size: 12.5px; color: #52525b; margin: 20px 0;'>
                            Need immediate assistance? Contact our help desk at <strong>" . setting('contact_phone', '+91 76007 57008') . "</strong> or reply directly to this email.
                        </div>
                        <p style='color: #a1a1aa; font-size: 11.5px; text-align: center;'>
                            " . setting('copyright_text', 'Copyright © ' . date('Y') . ' Voltiva. All Rights Reserved.') . "
                        </p>
                    </div>
                ", function ($message) use ($leadEmail, $brandName, $senderEmail, $leadName) {
                    $message->to($leadEmail, $leadName)
                            ->from($senderEmail, $brandName)
                            ->subject("Thank you for contacting {$brandName}");
                });
            }
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::warning('Lead email dispatch skipped or failed: ' . $e->getMessage());
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you! Your inquiry has been received. Our team will contact you shortly.',
            ]);
        }

        return back()->with('success', 'Thank you! Your inquiry has been received. Our team will contact you shortly.');
    }

    public function product()
    {
        $categories = Category::with(['subCategories.products'])->get();
        return view('product', compact('categories'));
    }

    public function categoryProducts($id)
    {
        $category = Category::with(['subCategories.products'])->findOrFail($id);
        return view('category-products', compact('category'));
    }
}
