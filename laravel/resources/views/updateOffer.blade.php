

@extends('layout.masterLayout')

@section('title','updateOffer')


@section('container')

<div class="nav1 p-3 ">
    <p id="logo1" class="my-auto">My Baby</p>
    <ul class="menu1 my-auto">
        <li><a href="offre">Offres</a></li>
        <li><a href="demande">Demandes</a></li>
        <li><a href="{{ route('logout') }}">Se déconnecter</a></li>
    </ul>
    <div id="hamburger-icon" onclick="toggleMobileMenu(this)">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <ul class="mobile-menu">
            <li><a href="offre">Offres</a></li>
            <li><a href="demande">Demandes</a></li>
            <li><a href="{{ route('logout') }}" >Se déconnecter</a></li>
        </ul>
    </div>
</div>


<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter Post</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/updateOffer/{{$get_offer->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="mb-2">
                  <label for="">Titre :</label>
                  <input type="text" name="titre" class="form-control" value="{{ $get_offer->titre }}">
                  <p class="text-danger">@error('titre') {{ $message }} @enderror</p>
              </div>
              <div class="mb-2">
                <label for="">Description :</label>
                <input type="text" name="description" class="form-control" value="{{$get_offer->description }}">
                <p class="text-danger">@error('description') {{ $message }} @enderror</p>
              </div>
              <div class="mb-2">
                <label for="">Prix :</label>
                <input type="number" name="prix"  class="form-control" value="{{ $get_offer->prix }}">
                <p class="text-danger">@error('prix') {{ $message }} @enderror</p>
              </div>
              <div class="mb-2">
                <label for="">Image :</label>
                <input type="file" name="image"  class="form-control" value="{{ $get_offer->image }}">
                <p class="text-danger">@error('image') {{ $message }} @enderror</p>
              </div>
              <div class="mb-2">
                <label for="">Sexe :</label>
                <select name="sexe" class="form-control" value="{{ $get_offer->sexe }}">
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

}
</style>

@section("scripts")
<script>
    function toggleMobileMenu(menu1) {
        menu1.classList.toggle('open');
    }
</script>
@endsection
