<div class="wrapper">
    <div class="page_header">
        <div>
            <h1>Tableau de bord</h1>
        </div>
        <div class="header_actions">
            <button>
                <span class="las la-file-export"></span>
                Export
            </button>
            <button>
                <span class="las la-tools"></span>
                Settings
            </button>
        </div>
    </div>
    <small>Voici quelques étapes afin de vous aider à prendre en main notre outil</small>
    <div class="card card--large">
        <h3>Vos premiers pas</h3>
        <div class="trainings_items">
            <ul>
                <div class="training_item">
                    <span class="steps">1</span>
                    <li>
                        <a href="/admin/tuto">Comment configurer l'outil ?</a>
                    </li>
                </div>
                <div class="training_item">
                    <span class="steps">2</span>
                    <li>
                        <a href="/admin/page/add">Créer votre première page</a>
                    </li>
                </div>
                <div class="training_item">
                    <span class="steps">3</span>
                    <li>
                        <a href="/admin/menu/add">Créer votre menu de navigation</a>
                    </li>
                </div>
                <div class="training_item">
                    <span class="steps">4</span>
                    <li>
                        <a href="/admin/product/create">Ajouter votre premier produit</a>
                    </li>
                </div>
            </ul>
        </div>
        <!-- <div class="cards cards--4-columns">
            <div class="card card--medium">
                <div class="card-info">
                    <div class="card_head">
                        <span>1. Comment configurer l'outil ?</span><br>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolorum natus et deleniti sapiente, earum ipsa sit nam recusandae placeat.</p><br>
                        <a href="#">En savoir plus</a>
                    </div>
                </div>
            </div>
            <div class="card card--medium">
                <div class="card-info">
                    <div class="card_head">
                        <span>2. Créer votre première page</span><br>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolorum natus et deleniti sapiente, earum ipsa sit nam recusandae placeat.</p><br>
                        <a href="#">Créer ma page</a>
                    </div>
                </div>
            </div>
            <div class="card card--medium">
                <div class="card-info">
                    <div class="card_head">
                        <span>3. Créer votre menu </span><br>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolorum natus et deleniti sapiente, earum ipsa sit nam recusandae placeat.</p><br>
                        <a href="#">Créer mon menu</a>
                    </div>
                </div>
            </div>
            <div class="card card--medium">
                <div class="card-info">
                    <div class="card_head">
                        <span>4. Ajouter votre premier produit</span><br>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolorum natus et deleniti sapiente, earum ipsa sit nam recusandae placeat.</p><br>
                        <a href="#">Créer mon produit</a>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <div class="cards cards--3-columns">
        <div class="card">
            <div class="card_flex card_flex--85">
                <div class="card_info">
                    <div class="card_head">
                        <span>Nos produits</span>
                        <small>Nombre de produits</small>
                    </div>
                    <h2><?= count($products) ?></h2>
                    <small>+2% de produits</small>
                </div>
                <div class="card_chart card_chart--red">
                    <span class="las la-chart-line"></span>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card_flex card_flex--85">
                <div class="card_info">
                    <div class="card_head">
                        <span>Les dernières commandes</span>
                        <small>Nombre de commandes</small>
                    </div>
                    <h2><?= count($products) ?></h2>
                    <small>+2% de commandes</small>
                </div>
                <div class="card_chart card_chart--green">
                    <span class="las la-chart-line"></span>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card_flex card_flex--85">
                <div class="card_info">
                    <div class="card_head">
                        <span>Nos clients</span>
                        <small>Nombre de clients</small>
                    </div>
                    <h2><?= count($users) ?></h2>
                    <small>+10% de clients</small>
                </div>
                <div class="card_chart card_chart--green">
                    <span class="las la-chart-line"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="orders">
        <h3>Détails des commandes</h3>
        <a href=""><small>Visualisez le détail de vos dernières commandes <span class="las la-arrow-right"></span></small></a>
        <div class="table_responsive">
            <table>
                <thead>
                    <th>
                        <div></div>
                    </th>
                    <th>
                        <div>N°</div>
                    </th>
                    <th>
                        <div>Nom</div>
                    </th>
                    <th>
                        <div>Statut</div>
                    </th>
                    <th>
                        <div>Heure</div>
                    </th>
                    <th>
                        <div>Actions</div>
                    </th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div>
                                <span class="indicator indicator--yellow"></span>
                            </div>
                        </td>
                        <td>
                            <div>Jane</div>
                        </td>
                        <td>
                            <div>Doe</div>
                        </td>
                        <td>
                            <div>New</div>
                        </td>
                        <td>
                            <div>14:00</div>
                        </td>
                        <td>
                            <div>
                                <i class="las la-eye"></i>
                                <i class="las la-envelope"></i>
                                <i class="las la-pen"></i>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <span class="indicator indicator--blue"></span>
                            </div>
                        </td>
                        <td>
                            <div>Jane</div>
                        </td>
                        <td>
                            <div>Doe</div>
                        </td>
                        <td>
                            <div>Doe</div>
                        </td>
                        <td>
                            <div>14:00</div>
                        </td>
                        <td>
                            <div>
                                <i class="las la-eye"></i>
                                <i class="las la-envelope"></i>
                                <i class="las la-pen"></i>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <span class="indicator indicator--yellow"></span>
                            </div>
                        </td>
                        <td>
                            <div>Jane</div>
                        </td>
                        <td>
                            <div>Doe</div>
                        </td>
                        <td>
                            <div>Doe</div>
                        </td>
                        <td>
                            <div>14:00</div>
                        </td>
                        <td>
                            <div>
                                <i class="las la-eye"></i>
                                <i class="las la-envelope"></i>
                                <i class="las la-pen"></i>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <label for="sidebar_toggle" class="body_label"></label>
</div>