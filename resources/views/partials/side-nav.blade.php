<style>
    .slimScrollBar {
        background: rgb(255, 255, 255) !important;
    }
</style>
<div id="sidebar-nav" class="sidebar">

    <div class="sidebar-scroll">

        <nav>

            <ul class="nav">

                <li>
                    <a href="{{ route('index') }}" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a>
                </li>

                <li>
                    <a href="{{ route('slides') }}" class=""><i class="lnr lnr-code"></i> <span>Slides</span></a>
                </li>

                <li>
                    <a href="{{ route('middleslides') }}" class=""><i class="lnr lnr-code"></i> <span>Middle Slides</span></a>
                </li>

                <li>
                    <a href="{{ route('dealslides.index') }}" class=""><i class="lnr lnr-code"></i> <span>Deal Slides</span></a>
                </li>

                <li>
                    <a href="{{ route('categories') }}" class=""><i class="lnr lnr-code"></i> <span>Categories</span></a>
                </li>

                {{-- <li>
                    <a href="{{ route('categorytypes') }}" class=""><i class="lnr lnr-code"></i> <span>Category Types</span></a>
                </li>

                <li>
                    <a href="{{ route('subcategories') }}" class=""><i class="lnr lnr-code"></i> <span>Sub Categories</span></a>
                </li> --}}

                {{-- <li>
                    <a href="{{ route('businesses') }}" class=""><i class="lnr lnr-code"></i> <span>Businesses</span></a>
                </li> --}}

                <li>
                    <a href="#business" data-toggle="collapse" class="collapsed">
                        <i class="lnr lnr-code"></i>
                        <span>Businesses</span>
                        <i class="icon-submenu lnr lnr-chevron-left"></i>
                    </a>
                    <div id="business" class="collapse">
                        <ul class="nav">
                            <li><a href="{{ route('businesses') }}">All Businesses</a></li>
                            <li><a href="{{ route('businesses.top') }}">Add Business To Top 10</a></li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#deal" data-toggle="collapse" class="collapsed">
                        <i class="lnr lnr-code"></i>
                        <span>Deals</span>
                        <i class="icon-submenu lnr lnr-chevron-left"></i>
                    </a>
                    <div id="deal" class="collapse">
                        <ul class="nav">
                            <li><a href="{{ route('deals.index') }}">All Deals</a></li>
                            <li><a href="{{ route('deals.create') }}">Add New Deal</a></li>
                            <li><a href="{{ route('deals.claimed') }}">Deals Claimed</a></li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{ route('deal-product.index') }}" class=""><i class="lnr lnr-code"></i> <span>Deals Product</span></a>
                </li>

                <li>
                    <a href="{{ route('brands') }}" class=""><i class="lnr lnr-code"></i> <span>Brands</span></a>
                </li>

                <li>
                    <a href="{{ route('brandfeeds') }}" class=""><i class="lnr lnr-code"></i> <span>Brand Feeds</span></a>
                </li>

                <li>
                    <a href="#transaction" data-toggle="collapse" class="collapsed">
                        <i class="lnr lnr-code"></i>
                        <span>Transactions</span>
                        <i class="icon-submenu lnr lnr-chevron-left"></i>
                    </a>
                    <div id="transaction" class="collapse">
                        <ul class="nav">
                            <li><a href="{{ route('transaction.menu') }}">Menu Transaction</a></li>
                            <li><a href="{{ route('transaction.deals') }}">Deals Transaction</a></li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#series" data-toggle="collapse" class="collapsed">
                        <i class="lnr lnr-camera-video"></i>
                        <span>Website Posts</span>
                        <i class="icon-submenu lnr lnr-chevron-left"></i>
                    </a>
                    <div id="series" class="collapse ">
                        <ul class="nav">
                            <li><a href="{{ route('strains') }}">Strains</a></li>
                            <li><a href="{{ route('genetics') }}">Genetics</a></li>
                            <li><a href="{{ route('allposts') }}">All Posts</a></li>
                            <li><a href="{{ route('createstrainpost') }}">Add New Post</a></li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#banners" data-toggle="collapse" class="collapsed">
                        <i class="lnr lnr-code"></i>
                        <span>Banners</span>
                        <i class="icon-submenu lnr lnr-chevron-left"></i>
                    </a>
                    <div id="banners" class="collapse">
                        <ul class="nav">
                            <li><a href="{{ route('delivery-banner.index') }}">Retailer</a></li>
                            <li><a href="{{ route('strain-banner.index') }}">Strain</a></li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{ route('site-settings.index') }}" class=""><i class="lnr lnr-code"></i> <span>Site Settings</span></a>
                </li>

                <li>
                    <a href="{{ route('notifications') }}" class=""><i class="lnr lnr-code"></i> <span>Website Notifications</span></a>
                </li>

                <li>
                    <a href="{{ route('pages') }}" class=""><i class="lnr lnr-code"></i> <span>Website Pages</span></a>
                </li>

                <li>
                    <a href="{{ route('myaccount') }}" class=""><i class="lnr lnr-code"></i> <span>My Account</span></a>
                </li>
                <li>
                    <a href="{{ route('imprter') }}" class=""><i class="lnr lnr-code"></i> <span>Importer</span></a>
                </li>

            </ul>

        </nav>

    </div>

</div>
