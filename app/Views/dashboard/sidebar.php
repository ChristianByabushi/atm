 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">
     <ul class="sidebar-nav" id="sidebar-nav">
         <li class="nav-item">
             <a class="nav-link " href="<?=  base_url('dashboard/index')?>">
                 <i class="bi bi-grid"></i>
                 <span>Dashboard</span>
             </a>
         </li><!-- End Dashboard Nav -->
        
         <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-menu-button-wide"></i><span>Stocks Dispo</span><i
                     class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="components-alerts.html">
                         <i class="bi bi-circle"></i><span>Journalier</span>
                     </a>
                 </li>
                 <li>
                     <a href="components-accordion.html">
                         <i class="bi bi-circle"></i><span>Hebdomadaire</span>
                     </a>
                 </li>
                 <li>
                     <a href="components-badges.html">
                         <i class="bi bi-circle"></i><span>Mensuel</span>
                     </a>
                 </li>
                </ul>
         </li><!-- End Stock Nav -->

         <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-journal-text"></i><span>Achats</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="<?=base_url("dashboard/bien")?>">
                         <i class="bi bi-circle"></i><span>Biens</span>
                     </a>
                 </li>  

                 <li>
                     <a href="<?=base_url("purchase_good_by/achat")?>">
                         <i class="bi bi-circle"></i><span>Approvisionnement</span>
                     </a>
                 </li>
                 <li>
                     <a href="forms-elements.html">
                         <i class="bi bi-circle"></i><span>Details Achats</span>
                     </a>
                 </li>
                 <li>
                     <a href="<?=base_url('purchase_good_by/client')?>">
                         <i class="bi bi-circle"></i><span>Clients</span>
                     </a>
                 </li>
             </ul>
         </li><!-- End Achats Nav -->

         <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-layout-text-window-reverse"></i><span>Ventes</span><i
                     class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="tables-general.html">
                         <i class="bi bi-circle"></i><span>General Tables</span>
                     </a>
                 </li>

                 <li>
                     <a href="tables-data.html">
                         <i class="bi bi-circle"></i><span>Data Tables</span>
                     </a>
                 </li> 
                 <li>
                     <a href="<?=base_url('/')?>">
                         <i class="bi bi-circle"></i><span>Fournisseurs</span>
                     </a>
                 </li>
             </ul>
         </li><!-- End Ventes Nav -->

         <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-bar-chart"></i><span>Graphiques</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="charts-chartjs.html">
                         <i class="bi bi-circle"></i><span>Achats</span>
                     </a>
                 </li>
                 <li>
                     <a href="charts-apexcharts.html">
                         <i class="bi bi-circle"></i><span>Ventes</span>
                     </a>
                 </li>

             </ul>
         </li><!-- End Charts Nav -->

         <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-gem"></i><span>Etats</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="icons-bootstrap.html">
                         <i class="bi bi-circle"></i><span>Ventes</span>
                     </a>
                 </li>
                 <li>
                     <a href="icons-remix.html">
                         <i class="bi bi-circle"></i><span>Achats</span>
                     </a>
                 </li>
                 <li>
                     <a href="icons-boxicons.html">
                         <i class="bi bi-circle"></i><span>Commandes</span>
                     </a>
                 </li>
             </ul>
         </li><!-- End Etats Nav -->

         <li class="nav-heading">Pages</li>

         <li class="nav-item">
             <a class="nav-link collapsed" href="users-profile.html">
                 <i class="bi bi-person"></i>
                 <span>Profile</span>
             </a>
         </li><!-- End Profile Page Nav -->

         <li class="nav-item">
             <a class="nav-link collapsed" href="pages-register.html">
                 <i class="bi bi-card-list"></i>
                 <span>Register</span>
             </a>
         </li><!-- End Register Page Nav -->

         <li class="nav-item">
             <a class="nav-link collapsed" href="pages-blank.html">
                 <i class="bi bi-lock"></i>
                 <span>Déconnecter</span>
             </a>
         </li><!-- End Blank Page Nav -->

     </ul>

 </aside><!-- End Sidebar-->