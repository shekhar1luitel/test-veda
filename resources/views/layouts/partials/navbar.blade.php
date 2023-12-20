<?php
$sidebar = [
    'Dashboard' => ['icon' => 'fas fa-tachometer-alt', 'url' => 'dashboard'],
    'Blog' => [
        'icon' => 'far fa-newspaper',
        'items' => [
            'Blog' => ['icon' => 'fa-solid fa-blog', 'url' => 'blog'],
            'Blog Show' => ['icon' => 'far fa-file', 'url' => 'blog.show'],
            'Blog Create' => ['icon' => 'far fa-edit', 'url' => 'blog.create'],
        ],
    ],
];
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/" class="brand-link">
        {{-- <img src="https://veda-app.s3.ap-south-1.amazonaws.com/assets/2/about/2023-04-17/pjpXLl9Lek1EOY77-1681731117.png" alt=""> --}}
        <img src="https://veda-app.s3.ap-south-1.amazonaws.com/assets/2/about/2023-04-17/pjpXLl9Lek1EOY77-1681731117.png"
            alt="Veda Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">VEDA</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="text-uppercase d-block">{{AUTH::user()->name}}</a>
            </div>
        </div>

        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @foreach ($sidebar as $label => $data)
                    <li class="nav-item">
                        <a href="{{ isset($data['url']) ? route($data['url']) : '#' }}" class="nav-link">
                            <i class="nav-icon {{ $data['icon'] }}"></i>
                            <p>{{ $label }}
                                @if (isset($data['items']) && is_array($data['items']) && count($data['items']) > 0)
                                    <i class="right fas fa-angle-left"></i>
                                @endif
                            </p>
                        </a>

                        @if (isset($data['items']))
                            <ul class="nav nav-treeview">
                                @foreach ($data['items'] as $subLabel => $subData)
                                    <li class="nav-item">
                                        <a href="{{ isset($subData['url']) ? route($subData['url']) : '#' }}"
                                            class="nav-link">
                                            <i class="nav-icon {{ $subData['icon'] }}"></i>
                                            <p>{{ $subLabel }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</aside>

