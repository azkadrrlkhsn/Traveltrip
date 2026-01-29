<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tripio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        
        /* --- STYLE KHUSUS WEB (WONDERLAND THEME) --- */
        .web-gold { color: #C19A6B; }
        .web-btn-brown { background-color: #4A3B32; color: white; }
        .web-btn-brown:hover { background-color: #2e241e; }
        .web-price-red { color: #D32F2F; }
        
        /* --- STYLE KHUSUS MOBILE (AIR TRAVEL THEME) --- */
        .mob-blue-header { background-color: #4FC3F7; }
        .mob-btn-yellow { background-color: #FFD54F; color: #1F2937; }
        .mob-card-shadow { box-shadow: 0 10px 40px -10px rgba(0,0,0,0.15); }

        /* Sembunyikan scrollbar untuk slider mobile */
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body>

    <div class="block md:hidden bg-gray-50 min-h-screen relative pb-24">
        
        <div class="mob-blue-header h-64 rounded-b-[40px] px-6 pt-12 text-white relative z-0">
            <div class="flex justify-between items-center mb-6">
                <div class="flex items-center gap-2">
                    <h1 class="text-xl font-bold">Tripio <i data-lucide="plane" class="inline w-5 h-5"></i></h1>
                </div>
                <button class="bg-white/20 p-2 rounded-full backdrop-blur-sm">
                    <i data-lucide="bell" class="w-5 h-5 text-white"></i>
                </button>
            </div>
        </div>

        <div class="px-6 -mt-32 relative z-10">
            <div class="bg-white rounded-[30px] p-6 mob-card-shadow">
                <div class="space-y-5">
                    <div class="group">
                        <label class="text-[10px] text-gray-400 font-medium ml-1">From</label>
                        <div class="flex items-center gap-3 border-b border-gray-100 pb-2">
                            <i data-lucide="plane-takeoff" class="w-5 h-5 text-gray-300"></i>
                            <input type="text" value="United States" class="w-full font-bold text-gray-700 focus:outline-none">
                        </div>
                    </div>
                    <div class="group">
                        <label class="text-[10px] text-gray-400 font-medium ml-1">To</label>
                        <div class="flex items-center gap-3 border-b border-gray-100 pb-2">
                            <i data-lucide="plane-landing" class="w-5 h-5 text-gray-300"></i>
                            <input type="text" value="Saudi Arabia" class="w-full font-bold text-gray-700 focus:outline-none">
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex-1">
                            <label class="text-[10px] text-gray-400 font-medium">Departure</label>
                            <div class="font-bold text-gray-700 text-sm mt-1">02 May 2025</div>
                        </div>
                        <div class="flex-1 border-l pl-4 border-gray-100">
                            <label class="text-[10px] text-gray-400 font-medium">Return</label>
                            <div class="font-bold text-gray-700 text-sm mt-1">25 May 2025</div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center pt-2">
                        <div>
                            <label class="text-[10px] text-gray-400 font-medium">Travelers</label>
                            <div class="font-bold text-gray-700 text-sm">03 Person</div>
                        </div>
                        <div class="flex items-center gap-3">
                            <button class="w-7 h-7 rounded-full border border-gray-300 flex items-center justify-center text-gray-400">-</button>
                            <span class="font-bold text-sm">03</span>
                            <button class="w-7 h-7 rounded-full border border-gray-300 flex items-center justify-center text-gray-400">+</button>
                        </div>
                    </div>
                    <button class="w-full mob-btn-yellow py-4 rounded-2xl font-bold shadow-lg shadow-yellow-100 transition transform active:scale-95">
                        Search Flight
                    </button>
                </div>
            </div>
        </div>

        <div class="px-6 mt-8">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold text-gray-800">Popular Destination</h2>
                <a href="#" class="text-[#4FC3F7] text-xs font-bold">View All</a>
            </div>
            
            <div class="flex gap-4 overflow-x-auto hide-scrollbar pb-4">
                <?php if(!empty($destinations)): ?>
                    <?php foreach($destinations as $dest): ?>
                    <div class="min-w-[160px] h-[200px] rounded-3xl overflow-hidden relative shadow-md flex-shrink-0">
                        <img src="<?= $dest['image_url'] ?>" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent p-4 flex flex-col justify-end">
                            <span class="bg-white/20 backdrop-blur-md text-white text-[9px] px-2 py-1 rounded-md w-fit mb-auto self-end"><?= esc($dest['category']) ?></span>
                            <p class="text-white font-bold text-sm"><?= esc($dest['name']) ?></p>
                            <p class="text-gray-200 text-[10px]"><?= esc($dest['location']) ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-sm text-gray-400 italic">No popular destinations found.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="fixed bottom-0 w-full bg-white border-t border-gray-100 py-4 px-8 rounded-t-[30px] shadow-[0_-5px_20px_rgba(0,0,0,0.05)] z-50 flex justify-between items-center">
            <button class="flex flex-col items-center gap-1 text-[#4FC3F7]">
                <div class="bg-[#4FC3F7]/10 p-2 rounded-xl"><i data-lucide="home" class="w-5 h-5"></i></div>
                <span class="text-[9px] font-bold">Home</span>
            </button>
            <button class="flex flex-col items-center gap-1 text-gray-300">
                <i data-lucide="plane" class="w-5 h-5"></i>
                <span class="text-[9px] font-medium">Flights</span>
            </button>
            <button class="flex flex-col items-center gap-1 text-gray-300">
                <i data-lucide="history" class="w-5 h-5"></i>
                <span class="text-[9px] font-medium">History</span>
            </button>
            <button class="flex flex-col items-center gap-1 text-gray-300">
                <i data-lucide="settings" class="w-5 h-5"></i>
                <span class="text-[9px] font-medium">Settings</span>
            </button>
        </div>
    </div>


    <div class="hidden md:block bg-white text-slate-800">
        
        <nav class="absolute top-0 w-full z-50 px-16 py-8 flex justify-between items-center text-white">
            <div class="flex items-center gap-16">
                <div class="flex flex-col items-center">
                    <i data-lucide="mountain" class="w-6 h-6 mb-1"></i>
                    <span class="font-bold tracking-widest text-sm">TRIPIO</span>
                </div>
                <div class="flex gap-8 text-xs font-medium tracking-wider">
                    <a href="#" class="hover:text-gray-300 transition">Tours <span class="text-[8px]">▼</span></a>
                    <a href="#" class="hover:text-gray-300 transition">Directions <span class="text-[8px]">▼</span></a>
                    <a href="#" class="hover:text-gray-300 transition">About us</a>
                    <a href="#" class="hover:text-gray-300 transition">News</a>
                    <a href="#" class="hover:text-gray-300 transition">Vacancies</a>
                    <a href="#" class="hover:text-gray-300 transition">Contacts</a>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <button class="border border-white/50 rounded-full w-8 h-8 flex items-center justify-center text-[10px]">TN</button>
                <button class="bg-white text-black rounded-full px-3 py-1 text-[10px] font-bold">EN ▼</button>
            </div>
        </nav>

        <section class="relative h-[850px] w-full overflow-hidden">
            <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=2000" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/20"></div>
            
            <div class="relative z-10 h-full flex flex-col justify-center items-center text-center text-white pt-20">
                <i data-lucide="mountain" class="w-8 h-8 mb-4 opacity-80"></i>
                <p class="text-xs uppercase tracking-[0.3em] font-light mb-2">WELCOME TO YOUR</p>
                <h1 class="text-8xl font-bold tracking-tight mb-6">Tripio</h1>
                <p class="text-sm font-light max-w-md leading-relaxed opacity-90">
                    We organize tours in Indonesia and neighboring countries.<br>
                    Discover the beauty of your home country with Tripio Tour.
                </p>

                <form action="<?= base_url('home/search') ?>" method="get" class="absolute bottom-24 bg-white rounded-full pl-8 pr-2 py-2 flex items-center shadow-2xl gap-4 w-[700px]">
                    <i data-lucide="search" class="w-4 h-4 text-gray-400"></i>
                    <input type="text" name="keyword" placeholder="Enter tour name" class="flex-1 text-sm text-gray-700 focus:outline-none placeholder:font-light" autocomplete="off">
                    <div class="h-6 w-[1px] bg-gray-200"></div>
                    <i data-lucide="calendar" class="w-4 h-4 text-gray-400"></i>
                    <input type="text" placeholder="14.03.2025 - 14.04.2025" class="w-48 text-sm text-gray-700 focus:outline-none placeholder:font-light text-center">
                    <button type="submit" class="web-btn-brown px-8 py-3 rounded-full text-[10px] font-bold tracking-widest uppercase hover:bg-black transition">
                        Search Tours
                    </button>
                </form>
            </div>
        </section>

        <section class="max-w-[1200px] mx-auto px-6 py-24">
            <div class="flex justify-between items-end mb-12">
                <h2 class="text-4xl font-bold text-[#4A3B32]">Special for you</h2>
                <a href="#" class="text-xs font-bold text-gray-400 border-b border-gray-200 pb-1 hover:text-black">all tours →</a>
            </div>

            <div class="grid grid-cols-3 gap-8">
                <?php if(!empty($tours)): ?>
                    <?php foreach($tours as $tour): ?>
                    <div class="group">
                        <div class="relative h-64 overflow-hidden rounded-sm mb-6">
                            <img src="<?= $tour['image_url'] ?>" class="w-full h-full object-cover transition duration-700 group-hover:scale-105">
                            <div class="absolute top-3 right-3 bg-white/30 backdrop-blur-md p-1.5 rounded-sm">
                                <i data-lucide="mountain" class="w-4 h-4 text-white"></i>
                            </div>
                        </div>
                        
                        <div class="flex gap-2 mb-2">
                            <?php 
                            $tags = explode(',', $tour['tags']); 
                            foreach($tags as $index => $tag):
                            ?>
                                <span class="text-[9px] text-gray-400 uppercase"><?= esc(trim($tag)) ?></span>
                                <?php if($index < count($tags) - 1): ?>
                                    <span class="text-[9px] text-gray-400 uppercase">•</span>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>

                        <h3 class="text-lg font-bold text-gray-800 mb-2"><?= esc($tour['name']) ?></h3>
                        <p class="text-xs text-gray-400 leading-relaxed mb-6 line-clamp-2"><?= esc($tour['description']) ?></p>
                        
                        <div class="flex gap-6 text-[10px] text-gray-500 font-bold mb-6">
                            <span class="flex items-center gap-2"><i data-lucide="calendar" class="w-3 h-3"></i> <?= esc($tour['duration']) ?> days</span>
                            <span class="flex items-center gap-2"><i data-lucide="user" class="w-3 h-3"></i> <?= esc($tour['capacity']) ?> person</span>
                        </div>
                        
                        <div class="flex justify-between items-center border-t border-gray-100 pt-6">
                            <div>
                                <p class="text-[10px] text-gray-400 line-through decoration-red-500"><?= number_format($tour['price'], 0, ',', '.') ?> P</p>
                                <p class="text-xl font-bold web-price-red"><?= number_format($tour['discount_price'], 0, ',', '.') ?> P</p>
                            </div>
                            <button class="web-btn-brown px-8 py-3 rounded-full text-[10px] font-bold tracking-widest uppercase hover:bg-black transition">BOOK</button>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-span-3 text-center py-10">
                        <p class="text-gray-500">Belum ada tur yang tersedia saat ini.</p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="flex gap-8 mt-24">
                <div class="flex-1 bg-white border border-gray-100 p-8 rounded-lg shadow-sm">
                    <h4 class="text-3xl font-bold text-[#4A3B32] mb-2">2 124 000</h4>
                    <p class="text-xs text-gray-400">kilometers <br> passed by our travelers</p>
                    <div class="h-1 w-10 bg-gray-200 mt-4"></div>
                </div>
                <div class="flex-1 bg-white border border-gray-100 p-8 rounded-lg shadow-sm">
                    <h4 class="text-3xl font-bold text-[#4A3B32] mb-2">8 200</h4>
                    <p class="text-xs text-gray-400">travelers <br> participated in our tours</p>
                    <div class="h-1 w-10 bg-gray-200 mt-4"></div>
                </div>
                <div class="flex-1 bg-white border border-gray-100 p-8 rounded-lg shadow-sm">
                    <h4 class="text-3xl font-bold text-[#4A3B32] mb-2">345</h4>
                    <p class="text-xs text-gray-400">positive feedback <br> for all years</p>
                    <div class="h-1 w-10 bg-gray-200 mt-4"></div>
                </div>
                <div class="flex-1 bg-white border border-gray-100 p-8 rounded-lg shadow-sm">
                    <h4 class="text-3xl font-bold text-[#4A3B32] mb-2">14</h4>
                    <p class="text-xs text-gray-400">years of work <br> for your wonderful experiences</p>
                    <div class="h-1 w-10 bg-gray-200 mt-4"></div>
                </div>
            </div>

        </section>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>