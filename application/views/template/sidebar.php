<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sidebar</title>
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>/css/style.css" />
</head>

<body>
    <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="sidebar">
            <div class="dots">
                <img src="<?= base_url('assets/'); ?>media/dots.png" alt="dots" />
            </div>
            <div class="profile">
                <ion-icon name="person-outline"></ion-icon>
            </div>
            <ul>
                <span>Analytics</span>
                <li>
                    <a href="#"><ion-icon name="home-outline"></ion-icon>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="#"><ion-icon name="stats-chart-outline"></ion-icon>
                        <p>Insights</p>
                    </a>
                </li>
            </ul>
            <ul>
                <span>Content</span>
                <li class="noti">
                    <a href="#"><ion-icon name="notifications-outline"></ion-icon>
                        <p>Notifications</p>
                    </a>
                </li>
                <li>
                    <a href="#"><ion-icon name="wallet-outline"></ion-icon>
                        <p>Wallets</p>
                    </a>
                </li>
                <li class="likes">
                    <a href="#"><ion-icon name="heart-outline"></ion-icon>
                        <p>Likes</p>
                    </a>
                </li>
            </ul>
            <ul>
                <span>Custom</span>
                <li class="switch-theme">
                    <a href="#"><ion-icon name="moon-outline"></ion-icon>
                        <p>Darkmode</p>
                        <button>
                            <div class="circle"></div>
                        </button>
                    </a>
                </li>
                <li>
                    <a href="#"><ion-icon name="log-out-outline"></ion-icon>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </div>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </div>
</body>

</html>