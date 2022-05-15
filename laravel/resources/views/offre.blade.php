

@extends('layout.masterLayout')

@section('title')
{{ $offre }}
@endsection

@section('container')

<div class="nav1 p-3 ">
    <p id="logo1" class="my-auto">My Baby</p>
    <ul class="menu1 my-auto">
        <li><a href="offre" class="active">Offres</a></li>
        <li><a href="demande">Demandes</a></li>
        <li><a href="{{ route('logout') }}">Se déconnecter</a></li>
    </ul>
    <div id="hamburger-icon" onclick="toggleMobileMenu(this)">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <ul class="mobile-menu">
            <li><a href="offre" class="active">Offres</a></li>
            <li><a href="demande">Demandes</a></li>
            <li><a href="{{ route('logout') }}" >Se déconnecter</a></li>
        </ul>
    </div>
</div>


<div class="mt-4">
    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" id="addPoste">
            <i class="bi bi-plus-circle-fill"></i>
    </button>
</div>


@if ($offers->count())
    @foreach ($offers as $offer)
    @if( $offer->sexe == "GIRL")
    
        <div class="poste">
            <div class="postNave">
                <h4>{{ $offer->titre }}</h4>
                @if ( auth()->user()->id === $offer->user_id)   
                <button class="btn border-none">
                    <div class="dropdown">
                        <a class="btn " href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical fs-4"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li>
                                <form action="/updateOffer/{{$offer->id}} ">
                                    <input type="submit" type="submit" style="background: none ; border:none" value="modifier">
                                </form>
                            </li>
                            <li>
                                <form action="{{ route('deleteoffer', $offer) }}" method="post">
                                @csrf
                                @method('DELETE')    
                                    <input type="submit" style="background: none ; border:none" value="spprimer">
                                </form>
                            </li>
                        </ul>
                    </div>
                </button>
                @endif
            </div>
                <p>{{ $offer->description }}</p>
                <h5>Prix : {{ $offer->prix }} $</h5>
                <img src="{{ asset('images/' . $offer->image) }}" alt="ff" class="postImage">
        </div>
    @else
        <div class="poste boy">
            <div class="postNave">
                <h4>{{ $offer->titre }}</h4>
                @if ( auth()->user()->id === $offer->user_id)  
                <button class="btn border-none">
                    <div class="dropdown">
                        <a class="btn " href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical fs-4"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li>
                                <form action="/updateOffer/{{$offer->id}} ">
                                    <input type="submit" type="submit" style="background: none ; border:none" value="modifier">
                                </form>
                            </li>
                            <li>
                                <form action="{{ route('deleteoffer', $offer) }}" method="post">
                                @csrf
                                @method('DELETE')    
                                    <input type="submit" style="background: none ; border:none" value="spprimer">
                                </form>
                            </li>
                        </ul>
                    </div>
                </button>
                @endif

            </div>
            <p>{{ $offer->description }}</p>
            <h5>Prix : {{ $offer->prix }} $</h5>
            <img src="{{ asset('images/' . $offer->image) }}" alt="ff" class="postImage">

        </div>

@endif   
    @endforeach
@else
    <p> no posts </p>
@endif

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter Post</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('offer') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="mb-2">
                  <label for="">Titre :</label>
                  <input type="text" name="titre" class="form-control" value="{{ old('titre') }}">
                  <p class="text-danger">@error('titre') {{ $message }} @enderror</p>
              </div>
              <div class="mb-2">
                <label for="">Description :</label>
                <input type="text" name="description" class="form-control" value="{{ old('description') }}">
                <p class="text-danger">@error('description') {{ $message }} @enderror</p>
              </div>
              <div class="mb-2">
                <label for="">Prix :</label>
                <input type="number" name="prix"  class="form-control" value="{{ old('prix') }}">
                <p class="text-danger">@error('prix') {{ $message }} @enderror</p>
              </div>
              <div class="mb-2">
                <label for="">Image :</label>
                <input type="file" name="image"  class="form-control" value="{{ old('image') }}">
                <p class="text-danger">@error('image') {{ $message }} @enderror</p>
              </div>
              <div class="mb-2">
                <label for="">Sexe :</label>
                <select name="sexe" class="form-control" value="{{ old('email') }}">
                    <option value=""></option>
                    <option value="BOY">Boy</option>
                    <option value="GIRL">Girl</option>
                </select>
                <p class="text-danger">@error('sexe') {{ $message }} @enderror</p>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" value="submit">Enregistrer</button>
        </div>
    </form>
      </div>
    </div>
  </div>

@endsection

<style>
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

.nav1{
    display: flex;
    justify-content: space-between;
    border-bottom: solid 1px black;
    margin-bottom: 30px;
}

.active{
    border-bottom: solid 2px black;
}

ul li a{
    text-decoration: none;
    font-size: 14px;
    color: black;
    display: block;

}

ul li{
    margin-left: 15px;
}

ul{
    list-style: none;
    display: flex;
    margin-right: 20px;
    margin-top: 20px;
}

#logo1{
    font-family: 'Great Vibes', cursive;
    font-weight: 1000;
    font-size: 20px;
}

#hamburger-icon {
    margin: auto 0;
    display: none;
    cursor: pointer;
}

#hamburger-icon ul li a{
    color:black;
    background-color: white;
}

#hamburger-icon div {
    width: 35px;
    height: 3px;
    background-color:rgb(0, 0, 0);
    margin: 6px 0;
    transition: 0.4s;
    margin-right: 20px;
}

.open .bar1 {
    -webkit-transform: rotate(-45deg) translate(-6px, 6px);
    transform: rotate(-45deg) translate(-6px, 6px);
}

.open .bar2 {
    opacity: 0;
}

.open .bar3 {
    -webkit-transform: rotate(45deg) translate(-6px, -8px);
    transform: rotate(45deg) translate(-6px, -8px);
}

.open .mobile-menu {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
}

.mobile-menu {
    background-color: white;
    display: none;
    position: absolute;
    top: 50px;
    right: 0;
    height: calc(100vh - 50px);
    width: 75%;
}

.mobile-menu li {
    margin-bottom: 10px;
}

.container{
    display: flex;
}


#addPoste{
    position: fixed;
    bottom: 0px;
    margin-bottom: 70px;
    margin-left: 50px;
}

.poste{
    width: 60%;
    background-color: #FAC6E1;
    padding: 20px;
    margin-left: 20%;
    margin-bottom: 20px;
    margin-right: 2%;
}

.postNave{
    display: flex;
    flex-direction: end;
    justify-content: space-between;
    margin-bottom: 10px;
}

.postNave img{
  size: 15px;
}

.postImage{
    margin-top: 10px;
    width:70%;
    height: 300px;
    object-fit: cover; 
}

.boy{
    background-color: #70d1f7fb;
}

@media (max-width: 600px) {
.menu1 {
    display: none;
}

#hamburger-icon {
    display: block;
}

ul{
    margin-right: 0px;
}

#addPoste{
    margin-bottom: 110px;
    margin-left: 3px;
    margin-right: 3px;
}

}
</style>

@section("scripts")
<script>
    function toggleMobileMenu(menu1) {
        menu1.classList.toggle('open');
    }
</script>
@endsection
