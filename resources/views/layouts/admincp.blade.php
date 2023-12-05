<!doctype html>
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin {{ $setting->sitename }} Websytem</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    {{-- @vite(['resources/sass/app.scss']) --}}
    <link rel="stylesheet" href="/assets/app-light.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://kit.fontawesome.com/1bfbc97117.js" crossorigin="anonymous"></script>
    <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/keymap/sublime.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/theme/darcula.min.css"/>

    <style>
        .mce-content-body {
    background: #eeeeee
}
    </style>
    <script src="/assets/app-light.js"></script>
</head>

<body data-theme="dark" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
    <div id="app" class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar" data-simplebar="init">
                <div class="simplebar-wrapper" style="margin: 0px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                                <div class="simplebar-content" style="padding: 0px;">
                                    <a class="sidebar-brand" href="/" target="_blank">
                                        <svg class="sidebar-brand-icon align-middle" width="32px" height="32px"
                                            viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="1.5"
                                            stroke-linecap="square" stroke-linejoin="miter" color="#FFFFFF"
                                            style="margin-left: -3px">
                                            <path d="M12 4L20 8.00004L12 12L4 8.00004L12 4Z"></path>
                                            <path d="M20 12L12 16L4 12"></path>
                                            <path d="M20 16L12 20L4 16"></path>
                                        </svg>
                                        <div class="mb-5">

                                            <span class="fw-bold sitetitle">ADMIN WEBSITE <sup><small
                                                        class="badge bg-primary text-uppercase">v3</small></sup></span>

                                        </div>

                                    </a>

                                    <ul class="sidebar-nav">
                                        <li class="sidebar-header">
                                            Menus
                                        </li>
                                        <li class="sidebar-item {{ request()->is('admincp') ? 'active' : '' }}">
                                            <a class="sidebar-link" href="/admincp">
                                                <i class="fa fa-home" aria-hidden="true"></i>
                                                <span class="align-middle">Dashboard</span>
                                                {{-- <span class="sidebar-badge badge bg-primary">Posts</span> --}}
                                            </a>
                                        </li>

                                        <li class="sidebar-item {{ request()->is('admincp/pages*') ? 'active' : '' }}">
                                            <a class="sidebar-link" href="{{ route('pages.index') }}">
                                                <i class="fa-solid fa-book"></i>
                                                <span class="align-middle">Pages</span>
                                                {{-- <span class="sidebar-badge badge bg-primary">Posts</span> --}}
                                            </a>
                                        </li>

                                        <li class="sidebar-item {{ request()->is('admincp/posts*') ? 'active' : '' }}">
                                            <a class="sidebar-link" href="{{ route('posts.index') }}">

                                                <i class="fa-solid fa-newspaper"></i>
                                                <span class="align-middle">Posts</span>
                                                {{-- <span class="sidebar-badge badge bg-primary">Posts</span> --}}
                                            </a>
                                        </li>

                                        <li
                                            class="sidebar-item {{ request()->is('admincp/announcements*') ? 'active' : '' }}">
                                            <a class="sidebar-link" href="{{ route('announcements.index') }}">
                                                <i class="fa-solid fa-scroll"></i>
                                                <span class="align-middle">Announcements</span>
                                                {{-- <span class="sidebar-badge badge bg-primary">Posts</span> --}}
                                            </a>
                                        </li>

                                        <li
                                            class="sidebar-item {{ request()->is('admincp/reports*') ? 'active' : '' }}">
                                            <a class="sidebar-link" href="{{ route('reports.index') }}">
                                                <i class="fa-solid fa-file-pdf"></i>
                                                <span class="align-middle">Reports</span>
                                                {{-- <span class="sidebar-badge badge bg-primary">Posts</span> --}}
                                            </a>
                                        </li>

                                        <li
                                            class="sidebar-item {{ request()->is('admincp/contacts*') ? 'active' : '' }}">
                                            <a class="sidebar-link " href="{{ route('contacts.index') }}">
                                                <i class="fa-solid fa-envelope"></i>
                                                <span class="align-middle">INBOX
                                                </span>
                                            </a>
                                        </li>


                                        <li class="sidebar-header">
                                            Editor
                                        </li>

                                        <li
                                            class="sidebar-item {{ request()->is('admincp/settings*') ? 'active' : '' }}">
                                            <a class="sidebar-link" href="{{ route('settings.index') }}">
                                                <i class="fa fa-gear" aria-hidden="true"></i>
                                                <span class="align-middle">Setting</span>
                                                {{-- <span class="sidebar-badge badge bg-primary">Posts</span> --}}
                                            </a>
                                        </li>

                                        <li
                                            class="sidebar-item {{ request()->is('admincp/navigation*') ? 'active' : '' }}">
                                            <a class="sidebar-link" href="{{ route('landingpages.index') }}">
                                                <i class="fa-solid fa-file-pdf"></i>
                                                <span class="align-middle">Navigation</span>
                                                {{-- <span class="sidebar-badge badge bg-primary">Posts</span> --}}
                                            </a>
                                        </li>


                                    </ul>
                                    <div class="sidebar-cta">
                                        <div class="sidebar-cta-content">
                                            <strong class="d-inline-block mb-2">Support Web</strong>
                                            <div class="mb-3 text-sm">
                                                Jika terdapat gangguan atau permasalahan, bisa kontak support kami
                                            </div>
                                            <div class="d-grid">

                                                <a href="https://api.whatsapp.com/send?phone=6285693749533&text=SupportWebSGE"
                                                    class="btn btn-outline-primary" target="_blank"><i
                                                        class="fa-brands fa-whatsapp"></i> Whatsapp</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: auto; height: 481px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                    <div class="simplebar-scrollbar"
                        style="height: 208px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                </div>
            </div>
        </nav>
        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <ul class="navbar-nav d-none d-lg-flex">
                    {{-- <li class="nav-item px-2 dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="megaDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mega Menu
                        </a>
                        <div class="dropdown-menu dropdown-menu-start dropdown-mega" aria-labelledby="megaDropdown">
                            <div class="d-md-flex align-items-start justify-content-start">
                                <div class="dropdown-mega-list">
                                    <div class="dropdown-header">UI Elements</div>
                                    <a class="dropdown-item" href="#">Alerts</a>
                                    <a class="dropdown-item" href="#">Buttons</a>
                                    <a class="dropdown-item" href="#">Cards</a>
                                    <a class="dropdown-item" href="#">Carousel</a>
                                    <a class="dropdown-item" href="#">General</a>
                                    <a class="dropdown-item" href="#">Grid</a>
                                    <a class="dropdown-item" href="#">Modals</a>
                                    <a class="dropdown-item" href="#">Tabs</a>
                                    <a class="dropdown-item" href="#">Typography</a>
                                </div>
                                <div class="dropdown-mega-list">
                                    <div class="dropdown-header">Forms</div>
                                    <a class="dropdown-item" href="#">Layouts</a>
                                    <a class="dropdown-item" href="#">Basic Inputs</a>
                                    <a class="dropdown-item" href="#">Input Groups</a>
                                    <a class="dropdown-item" href="#">Advanced Inputs</a>
                                    <a class="dropdown-item" href="#">Editors</a>
                                    <a class="dropdown-item" href="#">Validation</a>
                                    <a class="dropdown-item" href="#">Wizard</a>
                                </div>
                                <div class="dropdown-mega-list">
                                    <div class="dropdown-header">Tables</div>
                                    <a class="dropdown-item" href="#">Basic Tables</a>
                                    <a class="dropdown-item" href="#">Responsive Table</a>
                                    <a class="dropdown-item" href="#">Table with Buttons</a>
                                    <a class="dropdown-item" href="#">Column Search</a>
                                    <a class="dropdown-item" href="#">Muulti Selection</a>
                                    <a class="dropdown-item" href="#">Ajax Sourced Data</a>
                                </div>
                            </div>
                        </div>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="/" target="_blank" role="button">
                            <i data-feather="globe"></i>
                            Go to <strong>{{ $setting->url }}</strong>
                        </a>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="resourcesDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Resources
                        </a>
                        <div class="dropdown-menu" aria-labelledby="resourcesDropdown">
                            <a class="dropdown-item" href="https://adminkit.io/" target="_blank"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-home align-middle me-1">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                Homepage</a>
                            <a class="dropdown-item" href="https://adminkit.io/docs/" target="_blank"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-book-open align-middle me-1">
                                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                                </svg>
                                Documentation</a>
                            <a class="dropdown-item" href="https://adminkit.io/docs/getting-started/changelog/"
                                target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-edit align-middle me-1">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg> Changelog</a>
                        </div>
                    </li> --}}
                </ul>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">

                        <li class="nav-item dropdown">
                            <a class="nav-icon pe-md-0 dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img src="https://demo.adminkit.io/img/avatars/avatar.jpg"
                                    class="avatar img-fluid rounded" alt="Charles Hall">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">

                                <a class="dropdown-item" href="#">Hallo, @if (Auth::check())
                                        {{ Auth::user()->name }}
                                    @else
                                        Tamu
                                    @endif
                                </a>
                                <a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-help-circle align-middle me-1">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                    </svg> Help Center</a>
                                <div class="dropdown-divider"></div>
                                @guest
                                @else
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                @endguest
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content">
                @yield('content')

            </main>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="https://adminkit.io/" target="_blank" class="text-muted"><strong>{{ $setting->url }}</strong></a> ©
                            </p>
                        </div>
                        <div class="col-6 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Support</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Help Center</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Privacy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Terms</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

    </div>
    <!--wrapper end-->

    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!--<script src="/tinymce/tinymce.min.js"></script>-->
    <script src="https://cdn.tiny.cloud/1/nnd7pakaxqr7isf3oqefsdlew1jsidgl78umfeus6tg21ng0/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        var el = document.getElementById('example1');
        var sortable = Sortable.create(el, {
            animation: 150,
            ghostClass: 'blue-background-class'
        });
    </script>
    <script>
        var cm = new CodeMirror.fromTextArea(document.getElementById("editor"), {lineNumbers: true,  theme: "dracula"});
        var cm = new CodeMirror.fromTextArea(document.getElementById("editor2"), {lineNumbers: true,  theme: "dracula"});
    </script>
    <script>
        tinymce.init({
            selector: 'textarea.tinymce',
            height: 140,
            // toolbar: "undo redo",
            toolbar: false,
            menubar: false

        });
    </script>

    <script>
        tinymce.init({
            selector: 'textarea.tinymcefull',

            skin: 'bootstrap',
            content_css: "/frontend/assets/css/bootstrap.min.css",

            image_class_list: [{
                    title: 'image-left',
                    value: 'image-left'
                },
                {
                    title: 'image-right',
                    value: 'image-right'
                },
                {
                    title: 'image-center',
                    value: 'image-center'
                },
            ],
            height: 500,
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
            },
            plugins: [
                "code advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste imagetools"
            ],
            toolbar: "undo redo preview spellcheckdialog formatpainter | blocks fontfamily fontsize | bold italic underline forecolor backcolor | link image | alignleft aligncenter alignright alignjustify | code",
            menubar: false,
            image_title: true,
            automatic_uploads: true,

            images_upload_handler: function(blobInfo, success, failure) {
                var xhr, formData;
                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', '{{ route('upload') }}');
                var token = '{{ csrf_token() }}';
                xhr.setRequestHeader("X-CSRF-Token", token);
                xhr.onload = function() {
                    var json;
                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }
                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }
                    success(json.location);
                };
                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                xhr.send(formData);
            },

            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function() {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    };
                };
                input.click();
            }
        });
    </script>
    <script>
        $(document).ready(() => {
            $('#images').change(function() {
                const file = this.files[0];
                console.log(file);
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        console.log(event.target.result);
                        $('#imgPreview').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
    <script>
        document.getElementById('date').valueAsDate = new Date();
    </script>
    <script>
        @if (session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
    <script>
        $(document).ready(function() {
            $('#data').DataTable();
        });
    </script>
    <script>
        var fixHelperModified = function(e, tr) {
                var $originals = tr.children();
                var $helper = tr.clone();
                $helper.children().each(function(index) {
                    $(this).width($originals.eq(index).width())
                });
                return $helper;
            },
            updateIndex = function(e, ui) {
                $('td.index', ui.item.parent()).each(function(i) {
                    $(this).html(i + 1);


                });

                $('td input.in', ui.item.parent()).each(function(i) {
                    $(this).attr('value', i + 1);



                });

            };


        $("#sort tbody").sortable({
            helper: fixHelperModified,
            stop: updateIndex
        }).disableSelection();
    </script>
</body>

</html>
