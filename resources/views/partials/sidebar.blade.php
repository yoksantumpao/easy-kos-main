<div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Menu</li>
                    @if (Auth::guard('penghuni')->user())
                    <li>
                        <a href="{{ route('profil.penghuni', Auth::guard('penghuni')->user()->id) }}" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Profil</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('riwayat.penghuni', Auth::guard('penghuni')->user()->id) }}" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Riwayat</span>
                        </a>
                    </li>

                        
                    @endif
                    @if (Auth::user()->tipe == 'admin' || Auth::guard('pengelola')->user())
                        
                    
                    <li>
                        <a href="{{ route('rumah_kos.index') }}" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Rumah Kos</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('fasilitas_kos.index') }}" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Fasiltas Kos</span>
                        </a>
                    </li>    
                    <li>
                        <a href="{{ route('tipe_kamar.index') }}" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Tipe Kamar</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('kamar.index') }}" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Kamar</span>
                        </a>
                    </li>  
                    <li>
                        <a href="{{ route('rekening.index') }}" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Rekening</span>
                        </a>
                    </li>
                     <li>
                        <a href="{{ route('pembayaran.index') }}" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Pembayaran</span>
                        </a>
                    </li>
                    @endif      
                    {{-- {{ Auth::guard('pengelola')->user() }} --}}
                    @if (Auth::user()->tipe == 'admin')
                    {{-- @if (Auth::user()) --}}
                        
                        <li>
                            <a href="{{ route('penghuni_kos.index') }}" aria-expanded="false">
                                <i class="icon-badge menu-icon"></i><span class="nav-text">Penghuni Kos</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pengelola.index') }}" aria-expanded="false">
                                <i class="icon-badge menu-icon"></i><span class="nav-text">Pengelola</span>
                            </a>
                        </li>  
                             
                    @endif
                    <li>
                        <a 
                        href="{{ route('logout') }}"
                         aria-expanded="false">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            <span class="nav-text">Keluar</span>
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>