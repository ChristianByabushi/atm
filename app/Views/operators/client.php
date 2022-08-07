<?=$this->extend('dashboard/index')?>; // on spécifie le layout à
<?=$this->section('main');?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Gestion des clients</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('dashboard/index')?>">Dashboard</a></li>
                <li class="breadcrumb-item">Achats</li>
                <li class="breadcrumb-item active">Clients</li>
            </ol>
        </nav>
    </div><!-- End Page Title --> 
   
    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Listes des clients</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Ajouter
                                    clients</button>
                            </li>
                        </ul>

                        <!-- Part of contents nav -->
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <section class="section">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">Clients</h5>
                                                 
                                                    <!-- Table with stripped rows -->
                                                    <div class="search-bar">
                                                        <form class="search-form d-flex align-items-center"
                                                            method="POST" action="#">
                                                            <input type="text" name="query" placeholder="Search"
                                                                title="Enter search keyword">
                                                            <button type="submit" title="Search"><i
                                                                    class="bi bi-search"></i></button>
                                                        </form>
                                                    </div><!-- End Search Bar -->

                                                    <table class="table datatable " id="listClient">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col" class="first_name">Prenom</th>
                                                                <th scope="col" class="last_name">Nom</th>
                                                                <th scope="col" class="gender">Genre</th>
                                                                <th scope="col" class="phone">Phone</th>
                                                                <th scope="col" class="adress">Adresse</th>
                                                                <th scope="col" class="email">Email</th>
                                                                <th scope="col" class="update">Sup/Edit</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if (isset($Clients)) {?>
                                                            <?php foreach ($Clients as $client): ?>
                                                            <td> <?=$client->id?> </td>
                                                            <td class="first_name"> <?=$client->first_name?> </td>
                                                            <td class="last_name"> <?=$client->last_name?> </td>
                                                            <td class="gender"> <?=$client->gender?></td>
                                                            <td class="phone"> <?=$client->phone?></td>
                                                           <td class="email"> <?=$client->email?></td>
                                                            <td class="phone"> <?=$client->address?></td>
                                                            <td class="update"> <button type="button"
                                                                    class="btn btn-danger"><i
                                                                        class="bi bi-collection"></i></button>
                                                                <button type="button" class="btn btn-success"><i
                                                                        class="bi bi-check-circle"></i></button>
                                                            </td>
                                                            </tr>
                                                            <?php endforeach?>
                                                            <?php }?>
                                                        </tbody>
                                                    </table>
                                                    <!-- End Table with stripped rows -->
                                                </div>
                                            </div> 

                                        </div>
                                    </div>
                                </section>
                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <!-- Profile Edit Form -->
                                <form id="formNewClient" method="post" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-md-4 col-lg-3 col-form-label">
                                            Numero </label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="number" name="numero" id="numClient" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="firstName" class="col-md-4 col-lg-3 col-form-label">Prenom
                                        </label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="firstName" type="text" class="form-control" id="firstName"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="lastName" class="col-md-4 col-lg-3 col-form-label">Nom</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="lastName" type="text" class="form-control" id="lastName"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <select class="form-select" name="gender" id="chooseGender"
                                            aria-label="Floating label select example">
                                            <option value="0" selected>Choisir le genre</option>
                                            <option value="1">Homme</option>
                                            <option value="2">Femme</option>
                                        </select>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="address" type="text" class="form-control" id="address"
                                                value="">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" id="Phone" value="">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="Email" value="">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" id="btnSubmitClient"
                                            class="btn btn-primary operators">Enregistrer</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>


                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
<?=$this->endsection('content');?>