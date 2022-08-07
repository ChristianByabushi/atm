<?=$this->extend('./dashboard/index')?>; 
<?=$this->section('main');?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Approvisionnement</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('/')?>">Home</a></li>
                <li class="breadcrumb-item">Achats</li>
                <li class="breadcrumb-item active">Approvisionnement</li>
            </ol>
        </nav>
    </div>
    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered approvisionnement">
                            <li class="nav-item">
                                <button class="nav-link active listBonAchat" data-bs-toggle="tab"
                                    data-bs-target="#goodby-overview">Liste de bon d'achat</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link AddApprov" data-bs-toggle="tab" data-bs-target="#goodby-edit">Ajouter
                                    Bon d'achat</button>
                            </li> 
                            <li class="nav-item">
                                <button class="nav-link Payment" data-bs-toggle="tab" data-bs-target="#goodby-payment">Payement</button>
                            </li>
                        </ul>

                        <!-- Part of contents nav -->
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active goodby-overview" id="goodby-overview">
                                <?=view("achat/listgoodby")?>                            
                            </div>
                            <div class="tab-pane fade goodby-edit" id="goodby-edit">
                                <?=view("achat/addgoodby")?>
                            </div> 
                            <div class="tab-pane fade goodby-payment" id="goodby-payment">
                                <?=view("achat/payment")?> 
                            </div>
                        </div><!-- End Bordered Tabs -->
                    </div>
                </div>

            </div>
        </div>
    </section>
</main><!-- End #main --> 
<?=$this->endsection('main');?>