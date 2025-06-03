<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- MATERIAL CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" rel="stylesheet">
    <!-- STYLESHEET -->
    <link rel="stylesheet" href="/assets/css/admin.css">
</head>
<body>
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="./assets/img/kura.png" alt="">
                    <h2>TURTLE'S</h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-symbols-outlined">Close</span>
                </div>    
            </div>

            <div class="sidebar">
                <a href="#">
                    <span class="material-symbols-outlined">grid_view</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">receipt_long</span>
                    <h3>Order</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">insights</span>
                    <h3>Analytics</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">Message</span>
                    <h3>Messages</h3>
                    <span class="message-count">26</span>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">inventory</span>
                    <h3>Daftar Menu</h3>
                </a>
                <a href="">
                    <span class="material-symbols-outlined">add</span>
                    <h3>Add Menu</h3>
                </a>
                <a href="">
                    <span class="material-symbols-outlined">logout</span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!-- END OF ASIDE -->
         <main>
            <h1>Dashboard</h1>

            <div class="date">
                <input type="date">
            </div>

            <div class="insights">
                <div class="sales">
                    <span class="material-symbols-outlined">analytics</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Sales</h3>
                            <h1>$25,024</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>81%</p>
                            </div>  
                        </div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!-- END OF SALES -->
                <div class="expenses">
                    <span class="material-symbols-outlined">bar_chart</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Expenses</h3>
                            <h1>$14,160</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>62%</p>
                            </div>  
                        </div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!-- END OF EXPENSES -->
                <div class="income">
                    <span class="material-symbols-outlined">stacked_line_chart</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Income</h3>
                            <h1>$10,864</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>44%</p>
                            </div>  
                        </div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!-- END OF INCOME -->
            </div>
            <!-- END OF INSIGHTS -->

            <div class="recent-orders">
                <h2>Order</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomor Telepon</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Orang</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Foldable Mini Drone</td>
                            <td>85631</td>
                            <td>Due</td>
                            <td class="warning">Pending</td>
                            <td class="primary">Details</td>
                        </tr>
                        <tr>
                            <td>Foldable Mini Drone</td>
                            <td>85631</td>
                            <td>Due</td>
                            <td class="warning">Pending</td>
                            <td class="primary">Details</td>
                        </tr>
                        <tr>
                            <td>Foldable Mini Drone</td>
                            <td>85631</td>
                            <td>Due</td>
                            <td class="warning">Pending</td>
                            <td class="primary">Details</td>
                        </tr>
                        <tr>
                            <td>Foldable Mini Drone</td>
                            <td>85631</td>
                            <td>Due</td>
                            <td class="warning">Pending</td>
                            <td class="primary">Details</td>
                        </tr>
                        <tr>
                            <td>Foldable Mini Drone</td>
                            <td>85631</td>
                            <td>Due</td>
                            <td class="warning">Pending</td>
                            <td class="primary">Details</td>
                        </tr>
                    </tbody>
                </table>
                <a href="#">Show All</a>
            </div>
         </main>
         <!-- END OF MAIN -->

         <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <div class="theme-toggler">
                    <span class="material-symbols-outlined active">light_mode</span>
                    <span class="material-symbols-outlined">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p>Turtle's</p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="./assets/img/kura.png" alt="Profile" class="profile-picture">
                    </div>
                </div>
            </div>
            <!-- END OF TOP -->
            
        <div class="sales-analytics">
            <h2>Sales Analytics</h2>
            <div class="item offline">
                 <div class="icon">
                     <span class="material-symbols-outlined">local_mall</span>
                 </div>
                 <div class="right">
                     <div class="info">
                         <h3>OFFLINE ORDERS</h3>
                         <small class="text-muted">Last 24 Hours</small>
                     </div>
                     <h5 class="danger">-17%</h5>
                     <h3>1190</h3>
                 </div>
            </div>
            <div class="item online">
             <div class="icon">
                 <span class="material-symbols-outlined">
                     shopping_cart
                     </span>
             </div>
             <div class="right">
                 <div class="info">
                     <h3>ONLINE ORDERS</h3>
                     <small class="text-muted">Last 24 Hours</small>
                 </div>
                 <h5 class="success">+39%</h5>
                 <h3>3849</h3>
             </div>
        </div>
            <div class="item customers">
                 <div class="icon">
                     <span class="material-symbols-outlined">person</span>
                 </div>
                 <div class="right">
                     <div class="info">
                         <h3>NEW CUSTOMERS</h3>
                         <small class="text-muted">Last 24 Hours</small>
                     </div>
                     <h5 class="success">+25%</h5>
                     <h3>849</h3>
                 </div>
            </div>
            <div class="item add-product">
                 <div>
                     <span class="material-symbols-outlined">add</span>
                     <h3>Add ProdUct</h3>
                 </div>
            </div>
         </div>
    </div>
</body>
</html>
