<x-filament-widgets::widget>
<div class="voltiva-dashboard-root font-sans w-full"
     x-data="{
        range: '1y',
        chartData: @js($chartData),
        trafficChart: null,
        reachChart: null,
        isDark: false,
        getMetrics() {
            return (this.chartData && this.chartData.traffic && this.chartData.traffic[this.range])
                ? this.chartData.traffic[this.range]
                : { peak: '28.2K', leadsCount: 62, conversionRate: '100%', responseTime: '< 15 Mins' };
        },
        init() {
            const self = this;
            self.isDark = document.documentElement.classList.contains('dark');
            const checkApex = (attempts) => {
                if (typeof window.ApexCharts !== 'undefined') {
                    self.mountTrafficChart();
                    self.mountReachChart();
                    self.observeTheme();
                } else if (attempts < 50) {
                    setTimeout(() => checkApex(attempts + 1), 60);
                }
            };
            this.$nextTick(() => { setTimeout(() => checkApex(0), 50); });
        },
        mountTrafficChart() {
            const el = this.$refs.trafficChartRef;
            if (!el || typeof window.ApexCharts === 'undefined') return;
            if (this.trafficChart) { try { this.trafficChart.destroy(); } catch(e){} }
            const isDark = document.documentElement.classList.contains('dark');
            const metrics = this.getMetrics();
            const options = {
                chart: { type: 'area', height: 260, toolbar:{show:false}, zoom:{enabled:false}, fontFamily:'inherit', background:'transparent', animations:{enabled:true,easing:'easeinout',speed:600} },
                series: [{name:'Public Catalog Visitors',data:metrics.visitors},{name:'Wholesale & Dealer Inquiries',data:metrics.leads}],
                colors: [isDark?'#e4e4e7':'#09090b','#40bac7'],
                stroke: {curve:'smooth',width:[2.5,2],dashArray:[0,5]},
                fill: {type:'gradient',gradient:{shadeIntensity:1,opacityFrom:isDark?0.35:0.22,opacityTo:0.01,stops:[0,90,100]}},
                dataLabels:{enabled:false}, legend:{show:false}, markers:{size:0,hover:{size:5}},
                xaxis: {categories:metrics.labels,labels:{style:{colors:isDark?'#71717a':'#a1a1aa',fontSize:'11px',fontWeight:600}},axisBorder:{show:false},axisTicks:{show:false}},
                yaxis: [
                    {labels:{style:{colors:isDark?'#71717a':'#a1a1aa',fontSize:'11px',fontWeight:600},formatter:(val)=>val>=1000?(val/1000).toFixed(0)+'K':val}},
                    {opposite:true,labels:{style:{colors:'#40bac7',fontSize:'11px',fontWeight:600},formatter:(val)=>val+' L'}}
                ],
                grid:{borderColor:isDark?'#27272a':'#f4f4f5',strokeDashArray:4,padding:{left:8,right:8,top:5,bottom:0}},
                tooltip:{theme:isDark?'dark':'light',shared:true,intersect:false,y:{formatter:(val,opts)=>opts.seriesIndex===0?(val>=1000?(val/1000).toFixed(1)+'K':val)+' Visitors':val+' Inquiries'}}
            };
            this.trafficChart = new ApexCharts(el, options);
            this.trafficChart.render();
        },
        mountReachChart() {
            const el = this.$refs.reachChartRef;
            if (!el || typeof window.ApexCharts === 'undefined') return;
            if (this.reachChart) { try { this.reachChart.destroy(); } catch(e){} }
            const isDark = document.documentElement.classList.contains('dark') || document.body.classList.contains('dark');
            const reach = this.chartData.reach || {series:[62,26,12],labels:['Modular Touch Switches','Smart Sockets & Regulators','MCBs & Industrial Distribution']};
            const defaultColors = ['#40bac7','#38bdf8','#8b5cf6','#a855f7','#f59e0b','#94a3b8'];
            const chartColors = (reach.chartColors && reach.chartColors.length) ? reach.chartColors : defaultColors;
            const totalProd = reach.totalProducts || '731';
            const options = {
                chart:{type:'donut',height:190,fontFamily:'inherit',background:'transparent',animations:{enabled:true,easing:'easeinout',speed:700}},
                series:reach.series, labels:reach.labels,
                colors:chartColors,
                plotOptions:{
                    pie:{
                        donut:{
                            size:'72%',
                            labels:{
                                show:true,
                                name:{
                                    show:true,
                                    fontSize:'11px',
                                    fontWeight:700,
                                    color:isDark?'#e4e4e7':'#3f3f46',
                                    offsetY:-4
                                },
                                value:{
                                    show:true,
                                    fontSize:'20px',
                                    fontFamily:'Figtree, sans-serif',
                                    fontWeight:700,
                                    color:isDark?'#ffffff':'#09090b',
                                    offsetY:4,
                                    formatter:(val)=>val+'%'
                                },
                                total:{
                                    show:true,
                                    label:'TOTAL PRODUCTS',
                                    fontSize:'8.5px',
                                    fontFamily:'Figtree, sans-serif',
                                    fontWeight:700,
                                    color:isDark?'#38bdf8':'#0284c7',
                                    formatter:()=>totalProd
                                }
                            }
                        }
                    }
                },
                dataLabels:{enabled:false}, legend:{show:false},
                stroke:{show:true,width:2,colors:[isDark?'#202023':'#ffffff']},
                tooltip:{
                    theme:isDark?'dark':'light',
                    fillSeriesColor:false,
                    y:{formatter:(val)=>val+'% share'}
                }
            };
            this.reachChart = new ApexCharts(el, options);
            this.reachChart.render();
        },
        switchRange(newRange) {
            this.range = newRange;
            if (!this.trafficChart) return;
            const metrics = this.getMetrics();
            this.trafficChart.updateOptions({xaxis:{categories:metrics.labels},series:[{name:'Public Catalog Visitors',data:metrics.visitors},{name:'Wholesale & Dealer Inquiries',data:metrics.leads}]},true,true);
        },
        observeTheme() {
            const self = this;
            let debounceTimer = null;
            const updateTheme = () => {
                const isDark = document.documentElement.classList.contains('dark') || document.body.classList.contains('dark');
                self.isDark = isDark;
                if (self.trafficChart) {
                    try {
                        self.trafficChart.updateOptions({
                            colors: [isDark ? '#e4e4e7' : '#09090b', '#40bac7'],
                            grid: { borderColor: isDark ? '#27272a' : '#f4f4f5' },
                            tooltip: { theme: isDark ? 'dark' : 'light' },
                            xaxis: { labels: { style: { colors: isDark ? '#a1a1aa' : '#71717a' } } },
                            yaxis: [
                                { labels: { style: { colors: isDark ? '#a1a1aa' : '#71717a' } } },
                                { opposite: true, labels: { style: { colors: '#40bac7' } } }
                            ]
                        }, false, false);
                    } catch(e) {}
                }
                if (self.reachChart) {
                    try {
                        self.reachChart.updateOptions({
                            stroke: { colors: [isDark ? '#202023' : '#ffffff'] },
                            tooltip: { theme: isDark ? 'dark' : 'light' },
                            plotOptions: {
                                pie: {
                                    donut: {
                                        labels: {
                                            name: { color: isDark ? '#e4e4e7' : '#3f3f46' },
                                            value: { color: isDark ? '#ffffff' : '#09090b' },
                                            total: { color: isDark ? '#38bdf8' : '#0284c7' }
                                        }
                                    }
                                }
                            }
                        }, false, false);
                    } catch(e) {}
                }
            };

            const triggerUpdate = () => {
                if (debounceTimer) clearTimeout(debounceTimer);
                debounceTimer = setTimeout(updateTheme, 30);
            };

            const observer = new MutationObserver(triggerUpdate);
            observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });
            window.addEventListener('theme-changed', triggerUpdate);
        }
     }">

    <style>
        .voltiva-dashboard-root{font-family:'Figtree',system-ui,sans-serif;width:100%;min-width:0;}
        
        /* Ticker */
        .vd-ticker{display:flex;align-items:center;justify-content:space-between;padding:.6rem 1.1rem;border-radius:14px;background:#fff;border:1px solid #e4e4e7;font-size:.74rem;color:#52525b;box-shadow:0 1px 2px rgba(0,0,0,.03);flex-wrap:wrap;gap:8px;margin-bottom:1rem;}
        .dark .vd-ticker, html.dark .vd-ticker{background:#18181b !important;border-color:#27272a !important;color:#a1a1aa !important;}
        .vd-ticker-left{display:flex;align-items:center;gap:12px;flex-wrap:wrap;}
        .vd-ticker-chip{display:inline-flex;align-items:center;gap:5px;font-size:.73rem;}
        .vd-ticker-chip strong{color:#09090b;font-weight:700;}
        .dark .vd-ticker-chip strong, html.dark .vd-ticker-chip strong{color:#f4f4f5 !important;}
        .vd-clock{display:inline-flex;align-items:center;gap:5px;font-weight:700;font-size:.73rem;color:#0d9488;background:rgba(64,186,199,.1);padding:3px 10px;border-radius:7px;font-family:ui-monospace,monospace;}
        .dark .vd-clock, html.dark .vd-clock{color:#40bac7;background:rgba(64,186,199,.15);}
        @media(max-width:639px){
            .vd-ticker{padding:.5rem .75rem;font-size:.7rem;}
            .vd-ticker-left{gap:8px;}
            .vd-ticker-chip{font-size:.68rem;}
            .vd-clock{font-size:.68rem;padding:2px 8px;}
        }

        /* Hero */
        .vd-hero{border-radius:20px;padding:1.75rem 2rem;background:linear-gradient(130deg,#0c0c0e 0%,#1a1a1f 50%,#111114 100%);color:#fff;display:flex;align-items:center;justify-content:space-between;gap:1.5rem;flex-wrap:wrap;box-shadow:0 12px 32px -6px rgba(0,0,0,.35),0 0 0 1px rgba(255,255,255,.05) inset;position:relative;overflow:hidden;margin-bottom:1.25rem;font-family:'Figtree',sans-serif;}
        .vd-hero::before{content:'';position:absolute;top:-60px;right:-60px;width:260px;height:260px;background:radial-gradient(circle,rgba(64,186,199,.18) 0%,transparent 65%);pointer-events:none;}
        .vd-hero::after{content:'';position:absolute;bottom:-40px;left:30%;width:180px;height:180px;background:radial-gradient(circle,rgba(139,92,246,.1) 0%,transparent 65%);pointer-events:none;}
        .vd-hero-inner{position:relative;z-index:1;min-width:0;flex:1 1 300px;}
        .vd-hero-pill{display:inline-flex;align-items:center;gap:7px;font-size:.7rem;font-weight:500;color:#a1a1aa;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);padding:3px 11px;border-radius:999px;margin-bottom:.6rem;max-width:100%;letter-spacing:.01em;}
        .vd-live-dot{width:6px;height:6px;border-radius:50%;background:#10b981;box-shadow:0 0 7px #10b981;display:inline-block;animation:vd-pulse 2s ease-in-out infinite;flex-shrink:0;}
        @keyframes vd-pulse{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.6;transform:scale(.85)}}
        .vd-hero-title{font-size:1.55rem;font-weight:700;letter-spacing:-.025em;line-height:1.25;color:#fff;margin:0 0 .3rem;}
        .vd-hero-subtitle{font-size:.82rem;color:#71717a;line-height:1.55;max-width:560px;font-weight:400;}
        .vd-hero-actions{display:flex;align-items:center;gap:8px;flex-wrap:wrap;position:relative;z-index:1;}
        .vd-btn-white{display:inline-flex;align-items:center;justify-content:center;gap:6px;padding:.52rem 1.05rem;border-radius:10px;background:#fff;color:#09090b;font-size:.79rem;font-weight:600;letter-spacing:-.01em;text-decoration:none;transition:all .15s ease;box-shadow:0 2px 8px rgba(0,0,0,.2);white-space:nowrap;}
        .vd-btn-white:hover{background:#f4f4f5;transform:translateY(-1px);}
        .vd-btn-ghost{display:inline-flex;align-items:center;justify-content:center;gap:6px;padding:.52rem 1rem;border-radius:10px;background:rgba(255,255,255,.08);color:#e4e4e7;border:1px solid rgba(255,255,255,.14);font-size:.79rem;font-weight:500;letter-spacing:-.01em;text-decoration:none;transition:all .15s ease;white-space:nowrap;}
        .vd-btn-ghost:hover{background:rgba(255,255,255,.15);transform:translateY(-1px);}
        .vd-new-badge{background:#10b981;color:#fff;font-size:.65rem;font-weight:600;padding:1px 6px;border-radius:99px;}
        @media(max-width:639px){
            .vd-hero{padding:1.2rem 1rem;border-radius:16px;gap:1rem;}
            .vd-hero-title{font-size:1.28rem;}
            .vd-hero-subtitle{font-size:.75rem;}
            .vd-hero-actions{width:100%;display:grid;grid-template-columns:repeat(2,1fr);gap:8px;}
            .vd-btn-white, .vd-btn-ghost{padding:.52rem .75rem;font-size:.75rem;width:100%;box-sizing:border-box;}
        }
        @media(max-width:380px){
            .vd-hero-actions{grid-template-columns:1fr;}
        }

        /* KPI Grid */
        .vd-kpi-grid{display:grid;grid-template-columns:repeat(1,1fr);gap:.85rem;margin-bottom:1.25rem;font-family:'Figtree',sans-serif;}
        @media(min-width:540px){.vd-kpi-grid{grid-template-columns:repeat(2,1fr);gap:1rem;}}
        @media(min-width:1200px){.vd-kpi-grid{grid-template-columns:repeat(4,1fr);}}
        .vd-kpi{background:#fff;border:1px solid #e4e4e7;border-radius:18px;padding:1.15rem 1.25rem;display:flex;flex-direction:column;gap:.75rem;text-decoration:none;transition:all .2s cubic-bezier(.4,0,.2,1);box-shadow:0 1px 4px rgba(0,0,0,.03);min-width:0;}
        .dark .vd-kpi, html.dark .vd-kpi{background:#18181b !important;border-color:#27272a !important;}
        .vd-kpi:hover{transform:translateY(-3px);box-shadow:0 10px 28px rgba(0,0,0,.08);border-color:#09090b;}
        .dark .vd-kpi:hover, html.dark .vd-kpi:hover{border-color:#fff !important;box-shadow:0 10px 28px rgba(0,0,0,.4) !important;}
        .vd-kpi-top{display:flex;align-items:center;justify-content:space-between;min-width:0;}
        .vd-kpi-label{font-size:.7rem;font-weight:600;text-transform:uppercase;letter-spacing:.05em;color:#71717a;}
        .vd-kpi-icon{width:38px;height:38px;border-radius:11px;display:flex;align-items:center;justify-content:center;border:1px solid #e4e4e7;background:#fafafa;color:#09090b;flex-shrink:0;}
        .dark .vd-kpi-icon, html.dark .vd-kpi-icon{background:#27272a !important;border-color:#3f3f46 !important;color:#e4e4e7 !important;}
        .vd-kpi-body{display:flex;align-items:flex-end;justify-content:space-between;gap:8px;min-width:0;}
        .vd-kpi-body > div:first-child{display:flex;align-items:baseline;flex-wrap:wrap;gap:6px;min-width:0;}
        .vd-kpi-number{font-size:1.85rem;font-weight:700;letter-spacing:-.03em;line-height:1;color:#09090b;font-feature-settings:'tnum' on;}
        @media(min-width:640px){.vd-kpi-number{font-size:2.15rem;}}
        .dark .vd-kpi-number, html.dark .vd-kpi-number{color:#fff !important;}
        .vd-badge{display:inline-flex;align-items:center;gap:3px;font-size:.67rem;font-weight:600;padding:3px 8px;border-radius:7px;vertical-align:middle;white-space:nowrap;letter-spacing:.01em;}
        .vd-badge-green{background:#ecfdf5;color:#059669;}
        .dark .vd-badge-green, html.dark .vd-badge-green{background:rgba(5,150,105,.18) !important;color:#34d399 !important;}
        .vd-badge-gray{background:#f4f4f5;color:#52525b;}
        .dark .vd-badge-gray, html.dark .vd-badge-gray{background:#27272a !important;color:#a1a1aa !important;}
        .vd-spark{width:70px;height:28px;overflow:visible;flex-shrink:0;}
        .vd-kpi-bottom{display:flex;align-items:center;justify-content:space-between;padding-top:.7rem;border-top:1px solid #f4f4f5;font-size:.72rem;color:#71717a;min-width:0;}
        .dark .vd-kpi-bottom, html.dark .vd-kpi-bottom{border-top-color:#27272a !important;}
        .vd-kpi-bottom strong{color:#09090b;font-weight:600;white-space:nowrap;}
        .dark .vd-kpi-bottom strong, html.dark .vd-kpi-bottom strong{color:#fff !important;}

        /* Grids */
        .vd-charts-grid,.vd-bottom-grid{display:grid;grid-template-columns:1fr;gap:1.15rem;align-items:stretch;min-width:0;font-family:'Figtree',sans-serif;}
        @media(min-width:1200px){
            .vd-charts-grid,.vd-bottom-grid{grid-template-columns:minmax(0,1.85fr) minmax(0,1.15fr);}
        }

        /* Card */
        .vd-card{background:#fff;border:1px solid #e4e4e7;border-radius:18px;box-shadow:0 1px 4px rgba(0,0,0,.03);display:flex;flex-direction:column;overflow:hidden;min-width:0;}
        .dark .vd-card, html.dark .vd-card{background:#18181b !important;border-color:#27272a !important;}
        .vd-card-head{padding:1.05rem 1.3rem;border-bottom:1px solid #f4f4f5;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:10px;min-width:0;}
        .dark .vd-card-head, html.dark .vd-card-head{border-bottom-color:#27272a !important;}
        .vd-card-title{font-size:.9rem;font-weight:600;letter-spacing:-.015em;color:#09090b;display:flex;align-items:center;gap:7px;}
        .dark .vd-card-title, html.dark .vd-card-title{color:#fff !important;}
        .vd-card-desc{font-size:.71rem;color:#71717a;margin-top:2px;font-weight:400;}
        @media(max-width:639px){
            .vd-card-head{padding:.85rem 1rem;gap:8px;}
        }

        /* Sub-row */
        .vd-sub-row{display:flex;align-items:center;justify-content:space-around;padding:.7rem .9rem;background:#fafafa;border-radius:12px;border:1px solid #e4e4e7;flex-wrap:wrap;gap:10px;}
        .dark .vd-sub-row, html.dark .vd-sub-row{background:#202023 !important;border-color:#27272a !important;}
        .vd-sub-item{text-align:center;}
        .vd-sub-lbl{font-size:.65rem;font-weight:600;text-transform:uppercase;letter-spacing:.04em;color:#71717a;display:block;margin-bottom:2px;}
        .vd-sub-val{font-size:1.05rem;font-weight:700;letter-spacing:-.02em;color:#09090b;line-height:1;}
        .dark .vd-sub-val, html.dark .vd-sub-val{color:#fff !important;}
        .vd-trend{font-size:.65rem;font-weight:600;color:#059669;margin-left:3px;}
        @media(max-width:639px){
            .vd-sub-row{display:grid !important;grid-template-columns:repeat(2,1fr) !important;gap:10px 8px !important;padding:.75rem .6rem !important;}
            .vd-sub-row .vd-divider{display:none !important;}
        }

        /* Range */
        .vd-range-wrap{display:inline-flex;align-items:center;background:#f4f4f5;padding:2px;border-radius:8px;border:1px solid #e4e4e7;}
        .dark .vd-range-wrap{background:#27272a;border-color:#3f3f46;}
        .vd-range-btn{padding:4px 11px;font-size:11px;font-weight:600;border-radius:6px;color:#71717a;background:transparent;border:none;cursor:pointer;transition:all .14s ease;}
        .dark .vd-range-btn{color:#a1a1aa;}
        .vd-range-active{background:#18181b!important;color:#fff!important;box-shadow:0 1px 4px rgba(0,0,0,.18);}
        .dark .vd-range-active{background:#fff!important;color:#09090b!important;}

        /* Sync */
        .vd-sync{display:inline-flex;align-items:center;gap:5px;font-size:.68rem;font-weight:600;color:#0d9488;background:rgba(64,186,199,.1);border:1px solid rgba(64,186,199,.25);padding:3px 9px;border-radius:7px;}
        .dark .vd-sync{color:#40bac7;background:rgba(64,186,199,.12);}
        .vd-sync-dot{width:5px;height:5px;border-radius:50%;background:#10b981;box-shadow:0 0 6px #10b981;animation:vd-pulse 2s ease-in-out infinite;}

        /* Reach */
        .vd-reach-list{display:flex;flex-direction:column;gap:.5rem;max-height:225px;overflow-y:auto;padding-right:5px;}
        .vd-reach-list::-webkit-scrollbar{width:4px;}
        .vd-reach-list::-webkit-scrollbar-track{background:transparent;}
        .vd-reach-list::-webkit-scrollbar-thumb{background:#e4e4e7;border-radius:99px;}
        .dark .vd-reach-list::-webkit-scrollbar-thumb{background:#3f3f46;}
        .vd-reach-item{padding:.6rem .75rem;border-radius:10px;border:1px solid #f0f0f0;background:#fafafa;transition:background .15s ease,border-color .15s ease;}
        .vd-reach-item:hover{background:#f4f4f5;border-color:#e4e4e7;}
        .dark .vd-reach-item, html.dark .vd-reach-item{background:#202023 !important;border-color:#27272a !important;}
        .dark .vd-reach-item:hover, html.dark .vd-reach-item:hover{background:#27272a !important;border-color:#3f3f46 !important;}
        .vd-reach-head{display:flex;align-items:center;justify-content:space-between;font-size:.76rem;font-weight:600;letter-spacing:-.01em;color:#09090b;margin-bottom:2px;}
        .dark .vd-reach-head, html.dark .vd-reach-head{color:#f4f4f5 !important;}
        .vd-reach-name{display:inline-flex;align-items:center;gap:7px;color:inherit;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
        .vd-reach-dot{width:8px;height:8px;border-radius:50%;flex-shrink:0;display:inline-block;box-shadow:0 0 4px rgba(0,0,0,.15);}
        .vd-reach-val{font-size:.78rem;font-weight:700;color:inherit;flex-shrink:0;margin-left:6px;}
        .vd-reach-desc{font-size:.66rem;color:#71717a;margin-bottom:4px;font-weight:400;}
        .dark .vd-reach-desc, html.dark .vd-reach-desc{color:#a1a1aa !important;}
        .vd-prog-bar{width:100%;height:4px;background:#e4e4e7;border-radius:99px;overflow:hidden;margin-top:4px;}
        .dark .vd-prog-bar, html.dark .vd-prog-bar{background:#27272a !important;}
        .vd-prog-fill{height:100%;border-radius:99px;transition:width .8s cubic-bezier(.4,0,.2,1);}

        /* ApexCharts Tooltip Styling */
        .apexcharts-tooltip{border-radius:10px !important;box-shadow:0 10px 25px -5px rgba(0,0,0,.3) !important;border:1px solid #e4e4e7 !important;background:#ffffff !important;color:#09090b !important;font-family:'Figtree',sans-serif !important;}
        .dark .apexcharts-tooltip, html.dark .apexcharts-tooltip{background:#18181b !important;border-color:#27272a !important;color:#ffffff !important;box-shadow:0 10px 25px -5px rgba(0,0,0,.7) !important;}
        .apexcharts-tooltip-title{font-weight:600 !important;background:#f4f4f5 !important;border-bottom:1px solid #e4e4e7 !important;color:#09090b !important;font-family:'Figtree',sans-serif !important;}
        .dark .apexcharts-tooltip-title, html.dark .apexcharts-tooltip-title{background:#27272a !important;border-bottom-color:#3f3f46 !important;color:#ffffff !important;}
        .apexcharts-tooltip-text, .apexcharts-tooltip-text-y-value, .apexcharts-tooltip-text-y-label{color:inherit !important;font-family:'Figtree',sans-serif !important;}
        .dark .apexcharts-tooltip-text, .dark .apexcharts-tooltip-text-y-value, .dark .apexcharts-tooltip-text-y-label, html.dark .apexcharts-tooltip-text, html.dark .apexcharts-tooltip-text-y-value, html.dark .apexcharts-tooltip-text-y-label{color:#ffffff !important;}

        /* Table */
        .vd-table-wrap{overflow-x:auto;-webkit-overflow-scrolling:touch;width:100%;border-radius:0 0 17px 17px;font-family:'Figtree',sans-serif;}
        .vd-table{width:100%;min-width:600px;border-collapse:collapse;font-size:.8rem;}
        .vd-table th{padding:.68rem 1rem;font-size:.66rem;font-weight:600;text-transform:uppercase;letter-spacing:.05em;color:#71717a;background:#fafafa;border-bottom:1px solid #e4e4e7;white-space:nowrap;}
        .dark .vd-table th, html.dark .vd-table th{background:#202023 !important;border-bottom-color:#27272a !important;color:#a1a1aa !important;}
        .vd-table td{padding:.78rem 1rem;border-bottom:1px solid #f4f4f5;vertical-align:middle;}
        .dark .vd-table td, html.dark .vd-table td{border-bottom-color:#222226 !important;color:#e4e4e7 !important;}
        .vd-table tr:last-child td{border-bottom:none;}
        .vd-table tbody tr{transition:background .12s ease;}
        .vd-table tbody tr:hover td{background:#fafafa;}
        .dark .vd-table tbody tr:hover td, html.dark .vd-table tbody tr:hover td{background:#1f1f23 !important;}
        .vd-avatar{width:34px;height:34px;border-radius:10px;background:#09090b;color:#fff;display:flex;align-items:center;justify-content:center;font-weight:600;font-size:.75rem;flex-shrink:0;}
        .dark .vd-avatar, html.dark .vd-avatar{background:#f4f4f5 !important;color:#09090b !important;}
        .vd-status{display:inline-flex;align-items:center;gap:4px;padding:3px 9px;border-radius:7px;font-size:.67rem;font-weight:600;white-space:nowrap;}
        .vd-status-new{background:#ecfdf5;color:#059669;border:1px solid #bbf7d0;}
        .dark .vd-status-new, html.dark .vd-status-new{background:rgba(5,150,105,.15) !important;color:#34d399 !important;border-color:rgba(52,211,153,.2) !important;}
        .vd-status-contacted{background:#fffbeb;color:#d97706;border:1px solid #fde68a;}
        .dark .vd-status-contacted, html.dark .vd-status-contacted{background:rgba(217,119,6,.15) !important;color:#fbbf24 !important;border-color:rgba(251,191,36,.2) !important;}
        .vd-status-closed{background:#f4f4f5;color:#71717a;border:1px solid #e4e4e7;}
        .dark .vd-status-closed, html.dark .vd-status-closed{background:#27272a !important;color:#71717a !important;border-color:#3f3f46 !important;}
        .vd-act-btn{width:30px;height:30px;border-radius:8px;display:inline-flex;align-items:center;justify-content:center;text-decoration:none;border:1px solid #e4e4e7;background:#fafafa;color:#52525b;transition:all .14s ease;}
        .dark .vd-act-btn, html.dark .vd-act-btn{background:#27272a !important;border-color:#3f3f46 !important;color:#a1a1aa !important;}
        .vd-act-btn:hover{background:#09090b;color:#fff;border-color:#09090b;transform:scale(1.08);}
        .dark .vd-act-btn:hover, html.dark .vd-act-btn:hover{background:#fff !important;color:#09090b !important;border-color:#fff !important;}
        .vd-act-btn.wa{border-color:#bbf7d0;background:#ecfdf5;color:#059669;}
        .dark .vd-act-btn.wa, html.dark .vd-act-btn.wa{background:rgba(5,150,105,.15) !important;border-color:rgba(52,211,153,.2) !important;color:#34d399 !important;}
        .vd-act-btn.wa:hover{background:#059669;color:#fff;border-color:#059669;}
        .vd-mark-btn{padding:4px 10px;border-radius:7px;font-size:.67rem;font-weight:600;background:#f4f4f5;color:#09090b;border:1px solid #e4e4e7;cursor:pointer;transition:all .14s ease;white-space:nowrap;}
        .dark .vd-mark-btn, html.dark .vd-mark-btn{background:#27272a !important;color:#f4f4f5 !important;border-color:#3f3f46 !important;}
        .vd-mark-btn:hover{background:#09090b;color:#fff;border-color:#09090b;}
        .dark .vd-mark-btn:hover, html.dark .vd-mark-btn:hover{background:#fff !important;color:#09090b !important;}

        /* Filter */
        .vd-filter-wrap{display:inline-flex;align-items:center;gap:2px;background:#f4f4f5;padding:2px;border-radius:9px;border:1px solid #e4e4e7;}
        .dark .vd-filter-wrap, html.dark .vd-filter-wrap{background:#27272a !important;border-color:#3f3f46 !important;}
        .vd-filter-btn{padding:4px 11px;border-radius:7px;font-size:.7rem;font-weight:600;color:#71717a;background:transparent;border:none;cursor:pointer;transition:all .13s ease;white-space:nowrap;}
        .dark .vd-filter-btn, html.dark .vd-filter-btn{color:#a1a1aa !important;}
        .vd-filter-active{background:#18181b!important;color:#fff!important;box-shadow:0 1px 4px rgba(0,0,0,.18);}
        .dark .vd-filter-active, html.dark .vd-filter-active{background:#fff!important;color:#09090b!important;}
        @media(max-width:480px){
            .vd-filter-btn{padding:4px 8px;font-size:.65rem;}
        }

        /* Tiles */
        .vd-tiles{display:grid;grid-template-columns:repeat(2,1fr);gap:.7rem;}
        @media(min-width:640px) and (max-width:1199px){
            .vd-tiles{grid-template-columns:repeat(4,1fr);}
        }
        @media(min-width:1200px){
            .vd-tiles{grid-template-columns:repeat(2,1fr);}
        }
        .vd-tile{display:flex;flex-direction:column;align-items:center;justify-content:center;gap:.45rem;text-align:center;padding:1rem .75rem;border-radius:14px;background:#fafafa;border:1px solid #e4e4e7;text-decoration:none;color:#09090b;transition:all .18s cubic-bezier(.4,0,.2,1);}
        .dark .vd-tile, html.dark .vd-tile{background:#202023 !important;border-color:#27272a !important;color:#f4f4f5 !important;}
        .vd-tile:hover{background:#fff;border-color:#09090b;transform:translateY(-3px);box-shadow:0 8px 22px rgba(0,0,0,.07);}
        .dark .vd-tile:hover, html.dark .vd-tile:hover{background:#27272a !important;border-color:#e4e4e7 !important;box-shadow:0 8px 22px rgba(0,0,0,.35) !important;}
        .vd-tile-icon{width:44px;height:44px;border-radius:13px;display:flex;align-items:center;justify-content:center;background:#fff;border:1px solid #e4e4e7;box-shadow:0 1px 4px rgba(0,0,0,.04);transition:all .18s ease;color:#09090b;}
        .dark .vd-tile-icon, html.dark .vd-tile-icon{background:#27272a !important;border-color:#3f3f46 !important;color:#e4e4e7 !important;}
        .vd-tile:hover .vd-tile-icon{background:#09090b;border-color:#09090b;color:#fff;}
        .dark .vd-tile:hover .vd-tile-icon, html.dark .vd-tile:hover .vd-tile-icon{background:#fff !important;border-color:#fff !important;color:#09090b !important;}
        .vd-tile-label{font-size:.76rem;font-weight:600;line-height:1.3;}
        .vd-tile-count{font-size:.64rem;font-weight:500;color:#71717a;}

        /* Utils */
        .vd-divider{width:1px;height:2rem;background:#e4e4e7;flex-shrink:0;}
        .dark .vd-divider, html.dark .vd-divider{background:#27272a !important;}
        .vd-view-link{font-size:.72rem;font-weight:600;color:#71717a;text-decoration:none;transition:color .14s;}
        .vd-view-link:hover{color:#09090b;}
        .dark .vd-view-link:hover{color:#fff;}
        .vd-pill{display:inline-block;padding:3px 10px;border-radius:7px;font-size:.68rem;font-weight:500;background:#f4f4f5;color:#52525b;max-width:200px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
        .dark .vd-pill{background:#27272a;color:#a1a1aa;}
        .vd-legend-dot{width:10px;height:3px;border-radius:99px;display:inline-block;}
        .vd-legend-dash{width:12px;height:0;border-top:2.5px dashed #40bac7;display:inline-block;}
    </style>



    {{-- HERO BANNER --}}
    <div class="vd-hero">
        <div class="vd-hero-inner">
            <div class="vd-hero-pill">
                <span class="vd-live-dot"></span>
                <span>Live Admin Console &bull; {{ $currentDate }} &bull; Enterprise Mode Active</span>
            </div>
            <h1 class="vd-hero-title">Welcome back, Super Admin!</h1>
            <p class="vd-hero-subtitle">Here's what's happening with Voltiva &mdash; production catalogs, dealer inquiries, media galleries &amp; real-time catalog engagement.</p>
        </div>
        <div class="vd-hero-actions">
            <a href="{{ url('/admin/products/create') }}" class="vd-btn-white">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Add Product
            </a>
            <a href="{{ url('/admin/blog-posts/create') }}" class="vd-btn-ghost">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                New Article
            </a>
            <a href="{{ url('/admin/leads') }}" class="vd-btn-ghost">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.5 11.5a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.41 1h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                Customer Leads
                @if($newLeads > 0)<span class="vd-new-badge">{{ $newLeads }} New</span>@endif
            </a>
            <a href="{{ url('/') }}" target="_blank" class="vd-btn-ghost">
                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                Live Site
            </a>
        </div>
    </div>

    {{-- KPI CARDS --}}
    <div class="vd-kpi-grid">
        <a href="{{ url('/admin/products') }}" class="vd-kpi">
            <div class="vd-kpi-top">
                <span class="vd-kpi-label">Product Catalog</span>
                <div class="vd-kpi-icon"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg></div>
            </div>
            <div class="vd-kpi-body">
                <div><span class="vd-kpi-number">{{ $totalProducts }}</span><span class="vd-badge vd-badge-green">Active</span></div>
                <svg class="vd-spark" viewBox="0 0 100 35" fill="none"><path d="M0 30 Q 20 25, 45 15 T 100 5" stroke="#09090b" stroke-width="2.5" stroke-linecap="round" class="dark:stroke-white"/><path d="M0 30 Q 20 25, 45 15 T 100 5 L 100 35 L 0 35 Z" fill="rgba(64,186,199,0.1)"/><circle cx="100" cy="5" r="3.5" fill="#40bac7"/></svg>
            </div>
            <div class="vd-kpi-bottom"><span>Modular Switches &amp; Accessories</span><strong>Catalog &rarr;</strong></div>
        </a>
        <a href="{{ url('/admin/leads') }}" class="vd-kpi">
            <div class="vd-kpi-top">
                <span class="vd-kpi-label">Lead Inquiries</span>
                <div class="vd-kpi-icon"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div>
            </div>
            <div class="vd-kpi-body">
                <div><span class="vd-kpi-number">{{ $totalLeads }}</span>
                @if($newLeads > 0)<span class="vd-badge vd-badge-green">{{ $newLeads }} New</span>
                @else<span class="vd-badge vd-badge-gray">All Handled</span>@endif</div>
                <svg class="vd-spark" viewBox="0 0 100 35" fill="none"><path d="M0 25 Q 30 5, 60 22 T 100 8" stroke="#09090b" stroke-width="2.5" stroke-linecap="round" class="dark:stroke-white"/><path d="M0 25 Q 30 5, 60 22 T 100 8 L 100 35 L 0 35 Z" fill="rgba(64,186,199,0.1)"/><circle cx="100" cy="8" r="3.5" fill="#40bac7"/></svg>
            </div>
            <div class="vd-kpi-bottom"><span>Dealer &amp; Bulk Quotations</span><strong>Review &rarr;</strong></div>
        </a>
        <a href="{{ url('/admin/categories') }}" class="vd-kpi">
            <div class="vd-kpi-top">
                <span class="vd-kpi-label">Categories</span>
                <div class="vd-kpi-icon"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg></div>
            </div>
            <div class="vd-kpi-body">
                <div><span class="vd-kpi-number">{{ $totalCategories }}</span><span class="vd-badge vd-badge-gray">{{ $totalSubCategories }} Sub</span></div>
                <svg class="vd-spark" viewBox="0 0 100 35" fill="none"><path d="M0 22 Q 35 28, 65 14 T 100 6" stroke="#09090b" stroke-width="2.5" stroke-linecap="round" class="dark:stroke-white"/><path d="M0 22 Q 35 28, 65 14 T 100 6 L 100 35 L 0 35 Z" fill="rgba(64,186,199,0.1)"/><circle cx="100" cy="6" r="3.5" fill="#40bac7"/></svg>
            </div>
            <div class="vd-kpi-bottom"><span>Structured Catalog Groups</span><strong>Manage &rarr;</strong></div>
        </a>
        <a href="{{ url('/admin/blog-posts') }}" class="vd-kpi">
            <div class="vd-kpi-top">
                <span class="vd-kpi-label">Blog Articles</span>
                <div class="vd-kpi-icon"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg></div>
            </div>
            <div class="vd-kpi-body">
                <div><span class="vd-kpi-number">{{ $totalBlogs }}</span><span class="vd-badge vd-badge-gray">{{ $totalBlogCategories }} Cat</span></div>
                <svg class="vd-spark" viewBox="0 0 100 35" fill="none"><path d="M0 28 Q 25 18, 55 12 T 100 4" stroke="#09090b" stroke-width="2.5" stroke-linecap="round" class="dark:stroke-white"/><path d="M0 28 Q 25 18, 55 12 T 100 4 L 100 35 L 0 35 Z" fill="rgba(64,186,199,0.1)"/><circle cx="100" cy="4" r="3.5" fill="#40bac7"/></svg>
            </div>
            <div class="vd-kpi-bottom"><span>Guides &amp; Tech Articles</span><strong>Publish &rarr;</strong></div>
        </a>
    </div>

    {{-- CHARTS GRID --}}
    <div class="vd-charts-grid" style="margin-bottom:1.15rem;">
        <div class="vd-card">
            <div class="vd-card-head">
                <div>
                    <div class="vd-card-title">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        Visitor Traffic &amp; Wholesale Inquiries
                    </div>
                    <div class="vd-card-desc">Real-time engagement trajectory across public catalog touchpoints</div>
                </div>
                <div style="display:flex;align-items:center;gap:8px;">
                    <div class="vd-range-wrap">
                        <button type="button" @click="switchRange('7d')" :class="{ 'vd-range-active': range === '7d' }" class="vd-range-btn">7D</button>
                        <button type="button" @click="switchRange('30d')" :class="{ 'vd-range-active': range === '30d' }" class="vd-range-btn">30D</button>
                        <button type="button" @click="switchRange('1y')" :class="{ 'vd-range-active': range === '1y' }" class="vd-range-btn">1Y</button>
                    </div>
                    <div class="vd-sync"><span class="vd-sync-dot"></span>Live Sync</div>
                </div>
            </div>
            <div style="padding:1.1rem 1.3rem;flex:1;display:flex;flex-direction:column;gap:.85rem;">
                <div class="vd-sub-row">
                    <div class="vd-sub-item">
                        <span class="vd-sub-lbl">Peak Traffic</span>
                        <span class="vd-sub-val"><span x-text="getMetrics().peak">{{ $chartData['traffic']['1y']['peak'] }}</span><span class="vd-trend">+14.2%</span></span>
                    </div>
                    <div class="vd-divider hidden sm:block"></div>
                    <div class="vd-sub-item">
                        <span class="vd-sub-lbl">Wholesale Leads</span>
                        <span class="vd-sub-val"><span x-text="getMetrics().leadsCount">{{ $chartData['traffic']['1y']['leadsCount'] }}</span><span class="vd-trend">+18.4%</span></span>
                    </div>
                    <div class="vd-divider hidden sm:block"></div>
                    <div class="vd-sub-item">
                        <span class="vd-sub-lbl">Deal Conversion</span>
                        <span class="vd-sub-val" x-text="getMetrics().conversionRate">{{ $chartData['traffic']['1y']['conversionRate'] }}</span>
                    </div>
                    <div class="vd-divider hidden sm:block"></div>
                    <div class="vd-sub-item">
                        <span class="vd-sub-lbl">Avg Response</span>
                        <span class="vd-sub-val" x-text="getMetrics().responseTime">{{ $chartData['traffic']['1y']['responseTime'] }}</span>
                    </div>
                </div>
                <div wire:ignore style="position:relative;width:100%;min-height:260px;flex:1;">
                    <div x-ref="trafficChartRef" id="voltivaTrafficApexChart" style="width:100%;min-height:260px;"></div>
                </div>
                <div style="display:flex;align-items:center;justify-content:center;gap:20px;padding-top:.5rem;border-top:1px solid #f4f4f5;font-size:.72rem;font-weight:600;color:#71717a;">
                    <div style="display:flex;align-items:center;gap:6px;"><span class="vd-legend-dot" style="background:#09090b;"></span><span>Public Catalog Visitors</span></div>
                    <div style="display:flex;align-items:center;gap:6px;"><span class="vd-legend-dash"></span><span style="color:#40bac7;font-weight:700;">Wholesale Inquiries</span></div>
                </div>
            </div>
        </div>

        <div class="vd-card">
            <div class="vd-card-head">
                <div>
                    <div class="vd-card-title">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"/><path d="M22 12A10 10 0 0 0 12 2v10z"/></svg>
                        Product Catalog Reach
                    </div>
                    <div class="vd-card-desc">Live category distribution &amp; catalog volume breakdown</div>
                </div>
                <div style="display:flex;align-items:center;gap:8px;">
                    <span class="vd-sync"><span class="vd-sync-dot"></span>{{ count($chartData['reach']['items']) }} Series</span>
                    <a href="{{ url('/admin/categories') }}" class="vd-view-link">View All &rarr;</a>
                </div>
            </div>
            <div style="padding:1rem 1.25rem;flex:1;display:flex;flex-direction:column;gap:.75rem;min-width:0;">
                <div wire:ignore style="display:flex;align-items:center;justify-content:center;width:100%;min-height:190px;">
                    <div x-ref="reachChartRef" id="voltivaReachApexChart" style="width:100%;min-height:190px;"></div>
                </div>
                <div class="vd-reach-list">
                    @foreach($chartData['reach']['items'] as $item)
                        <div class="vd-reach-item">
                            <div class="vd-reach-head">
                                <span class="vd-reach-name" title="{{ $item['name'] }}">
                                    <span class="vd-reach-dot" style="background:{{ $item['color'] }};"></span>
                                    <span>{{ $item['name'] }}</span>
                                </span>
                                <span class="vd-reach-val">{{ $item['share'] }}%</span>
                            </div>
                            <div class="vd-reach-desc">{{ $item['desc'] }}</div>
                            <div class="vd-prog-bar"><div class="vd-prog-fill" style="width:{{ min(100, max(3, $item['share'])) }}%;background:{{ $item['color'] }};"></div></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- BOTTOM GRID --}}
    <div class="vd-bottom-grid">
        <div class="vd-card">
            <div class="vd-card-head">
                <div>
                    <div class="vd-card-title">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                        Recent Customer Inquiries
                    </div>
                    <div class="vd-card-desc">Direct communications via public catalog &amp; contact forms</div>
                </div>
                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;">
                    <div class="vd-filter-wrap">
                        <button type="button" wire:click="filterLeads('all')" class="vd-filter-btn {{ $leadFilter === 'all' ? 'vd-filter-active' : '' }}">All ({{ $totalLeads }})</button>
                        <button type="button" wire:click="filterLeads('new')" class="vd-filter-btn {{ $leadFilter === 'new' ? 'vd-filter-active' : '' }}">New ({{ $newLeads }})</button>
                        <button type="button" wire:click="filterLeads('contacted')" class="vd-filter-btn {{ $leadFilter === 'contacted' ? 'vd-filter-active' : '' }}">Contacted</button>
                    </div>
                    <a href="{{ url('/admin/leads') }}" class="vd-view-link">CRM &rarr;</a>
                </div>
            </div>
            <div class="vd-table-wrap">
                <table class="vd-table">
                    <thead>
                        <tr>
                            <th>Customer / Buyer</th><th>Requirement</th><th>Contact</th><th>Status</th><th style="text-align:right;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentLeads as $lead)
                            <tr>
                                <td>
                                    <div style="display:flex;align-items:center;gap:10px;">
                                        <div class="vd-avatar">{{ strtoupper(substr($lead->name, 0, 1)) }}</div>
                                        <div>
                                            <div style="font-weight:700;font-size:.82rem;color:#09090b;" class="dark:text-white">{{ $lead->name }}</div>
                                            <div style="font-size:.67rem;color:#a1a1aa;">{{ $lead->created_at->diffForHumans() }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="vd-pill" title="{{ $lead->subject }}">{{ $lead->subject ?: 'General Inquiry' }}</span></td>
                                <td>
                                    <div style="font-size:.79rem;font-weight:600;color:#09090b;" class="dark:text-white">{{ $lead->phone ?: 'N/A' }}</div>
                                    <div style="font-size:.67rem;color:#a1a1aa;">{{ $lead->email ?: 'N/A' }}</div>
                                </td>
                                <td>
                                    @if($lead->status === 'new')
                                        <span class="vd-status vd-status-new"><span style="width:5px;height:5px;border-radius:50%;background:#10b981;display:inline-block;"></span>New</span>
                                    @elseif($lead->status === 'contacted')
                                        <span class="vd-status vd-status-contacted"><span style="width:5px;height:5px;border-radius:50%;background:#d97706;display:inline-block;"></span>Contacted</span>
                                    @else
                                        <span class="vd-status vd-status-closed">Closed</span>
                                    @endif
                                </td>
                                <td style="text-align:right;">
                                    <div style="display:inline-flex;align-items:center;gap:5px;">
                                        @if($lead->phone)
                                            <a href="tel:{{ $lead->phone }}" title="Call" class="vd-act-btn">
                                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.5 11.5a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.41 1h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                            </a>
                                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $lead->phone) }}" target="_blank" title="WhatsApp" class="vd-act-btn wa">
                                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                                            </a>
                                        @endif
                                        @if($lead->status === 'new')
                                            <button type="button" wire:click="markLeadStatus({{ $lead->id }}, 'contacted')" class="vd-mark-btn">Mark Contacted</button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align:center;padding:2.5rem 1rem;font-size:.8rem;color:#a1a1aa;">
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="margin:0 auto .5rem;display:block;opacity:.4;"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                                    No inquiries found for this filter.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Quick Hub --}}
        <div class="vd-card">
            <div class="vd-card-head">
                <div>
                    <div class="vd-card-title">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                        Quick Management
                    </div>
                    <div class="vd-card-desc">Direct shortcuts to all admin modules</div>
                </div>
                <div class="vd-sync"><span class="vd-sync-dot"></span>8 Modules</div>
            </div>
            <div style="padding:1.1rem 1.3rem;flex:1;">
                <div class="vd-tiles">
                    <a href="{{ url('/admin/products') }}" class="vd-tile">
                        <div class="vd-tile-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg></div>
                        <span class="vd-tile-label">Products</span>
                        <span class="vd-tile-count">{{ $totalProducts }} items</span>
                    </a>
                    <a href="{{ url('/admin/categories') }}" class="vd-tile">
                        <div class="vd-tile-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg></div>
                        <span class="vd-tile-label">Categories</span>
                        <span class="vd-tile-count">{{ $totalCategories }} groups</span>
                    </a>
                    <a href="{{ url('/admin/sub-categories') }}" class="vd-tile">
                        <div class="vd-tile-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/><line x1="12" y1="12" x2="16" y2="12"/><line x1="12" y1="16" x2="16" y2="16"/></svg></div>
                        <span class="vd-tile-label">Sub Categories</span>
                        <span class="vd-tile-count">{{ $totalSubCategories }} entries</span>
                    </a>
                    <a href="{{ url('/admin/blog-posts') }}" class="vd-tile">
                        <div class="vd-tile-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg></div>
                        <span class="vd-tile-label">Blog Articles</span>
                        <span class="vd-tile-count">{{ $totalBlogs }} posts</span>
                    </a>
                    <a href="{{ url('/admin/leads') }}" class="vd-tile">
                        <div class="vd-tile-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div>
                        <span class="vd-tile-label">Lead Inquiries</span>
                        <span class="vd-tile-count">{{ $totalLeads }} total</span>
                    </a>
                    <a href="{{ url('/admin/page-banners') }}" class="vd-tile">
                        <div class="vd-tile-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg></div>
                        <span class="vd-tile-label">Page Banners</span>
                        <span class="vd-tile-count">{{ $totalBanners }} banners</span>
                    </a>
                    <a href="{{ url('/admin/page-seos') }}" class="vd-tile">
                        <div class="vd-tile-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg></div>
                        <span class="vd-tile-label">Page SEO</span>
                        <span class="vd-tile-count">Optimize</span>
                    </a>
                    <a href="{{ url('/admin/site-settings') }}" class="vd-tile">
                        <div class="vd-tile-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg></div>
                        <span class="vd-tile-label">Site Settings</span>
                        <span class="vd-tile-count">Configure</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
</x-filament-widgets::widget>