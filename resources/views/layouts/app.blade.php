<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/favicon.png')}}">
    <title>@yield('title')</title>

    <!-- style -->
    <link rel="stylesheet" href="{{asset('assets\css\bootstrap.min.css')}}">
    <link href="{{asset('assets\css\bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
    {{-- toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- livewire style --}}
    @livewireStyles
    {{-- costum styles --}}
    @yield('style')
</head>
<body>
    <!-- header -->
    @include('partials.nav_bar')
    <!-- content -->
    @yield('content')
    <!-- footer -->
    @include('partials.footer')
    
   

    <!-- script js  -->
    <script src="{{asset('assets/js/jquery-3.6.4.js')}}"></script>
    @yield('script')
    <script src="{{asset('assets/js/script.js')}}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="https://kit.fontawesome.com/8969832da8.js" crossorigin="anonymous"></script>
    {{-- livewire scripts --}}
    @livewireScripts
    {{-- sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
            window.addEventListener("show-delete-confirmation",event =>{
                Swal.fire({
                title: 'Es-tu sûr?',
                text: "Voulez-vous supprimer le service !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, supprimez-le!'
                }).then((result) => {
                if (result.isConfirmed) {

                    livewire.emit("delete");
                }
                })
                
            })

            window.addEventListener("service-deleted",event =>{
                Swal.fire("Supprimer","le service est supprimer avec succées !","success");
                
            })

            window.addEventListener("service-added",event =>{
                Swal.fire("Ajouter un Service","le service est Ajouter avec succées !","success");
                
            })
            
            window.addEventListener("service-updated",event =>{
                Swal.fire("Modifie un Service","le service est modifié avec succées !","success");
                
            })

            window.addEventListener("user-info",event =>{
                Swal.fire("les informations","Les informations ont été modifiées avec succès !  .","success");
            })
            window.addEventListener("user-image",event =>{
                Swal.fire("l'image","L'image a été modifiée avec succès  !","success");
            })
            window.addEventListener("user-password",event =>{
                Swal.fire("Mot de passe ","le mot de passe modifié avec succées !","success");
            })

            window.addEventListener("avis",event =>{
                Swal.fire("l'évaluation "," le service bien évaluée !","success");
            })
            window.addEventListener("demmande",event =>{
                Swal.fire("Demmande de service  "," la demmande de service effectuée avec succées !","success");
            })
    </script>
    
    </body>
</html>