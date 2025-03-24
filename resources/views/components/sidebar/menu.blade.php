<div class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 overflow-y-auto z-50" id="sidebar_menus">
    <ul class="sidebar-menu">
        <li>
            <a href="{{ route('home') }}" class="navItem">
            <span class="flex items-center">
                <iconify-icon class="nav-icon" icon="heroicons-outline:home"></iconify-icon>
                <span>Dashboard</span>
            </span>
            </a>
        </li>
        <!-- Apps Area -->
        <li>
            <a href="{{ route('inventory') }}" class="navItem">
            <span class="flex items-center">
                <iconify-icon class="nav-icon" icon="heroicons-outline:chat"></iconify-icon>
                <span>Inventory</span>
            </span>
            </a>
        </li>
    
    </ul>
    
    
</div>