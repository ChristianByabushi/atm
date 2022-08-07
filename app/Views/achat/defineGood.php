<?=$this->extend('./dashboard/index')?>; // on spécifie le layout à
<?=$this->section('main');?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Les biens de la compagnie </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('/')?>">Home</a></li>
                <li class="breadcrumb-item">Achats</li>
                <li class="breadcrumb-item active">Biens</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12 justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Informations sur le bien</h5>
                        <!-- General Form Elements -->
                        <form id="formNewProduct" method="post" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">
                                    Numero : </label>
                                <div class="col-sm-10">
                                    <input type="number" name="numero" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Produit :</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Dimension : </label>
                                <div class="col-sm-10">
                                    <input type="text" name="dimension" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="qualite" class="col-sm-2 col-form-label">Qualité :</label>
                                <div class="col-sm-10">
                                    <input type="text" name="qualite" class="form-control">
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <select class="form-select" name="categorie" id="chooseCategory"
                                    aria-label="Floating label select example">
                                    <option selected>Choisir la categorie du bien</option>
                                </select>
                                <label for="chooseCategory">Le choix aide à la recherche</label>
                            </div>

                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Description : </label>
                                <div class="col-sm-10">
                                    <textarea id="description" name="description" class="form-control"
                                        style="height: 100px"></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="formFile" class="col-sm-2 col-form-label">Choisir l'image : </label>
                                <div class="col-sm-10">
                                    <input class="form-control-file" type="file" name="image" id="formFile">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">Date d'achat : </label>
                                <div class="col-sm-10">
                                    <input type="date" name="create_at" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-6">
                                <div class="col-sm-12 btnSubmitProduct ">
                                    <button id="btnSubmitProduct" type="submit" class="btn btn-primary">Enregistrer
                                        produit</button>
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->

                    </div>
                    <!-- Button trigger modal -->


                    <!-- Modal -->
                    <div id="getCodeModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 id="myModalLabel">Gestion produit</h3>
                                </div>
                                <div class="modal-body">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->

                </div>

            </div>

        </div>
    </section>
</main><!-- End #main -->
<?=$this->endsection('main');?>