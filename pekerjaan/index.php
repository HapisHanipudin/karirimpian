<?php include '../src/php/config.php'; include '../src/php/auth.php'; $activeTabs = 'pekerjaan'; ?>

<!doctype html>
<html class="bg-slate-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pekerjaan</title>
    <link href="style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Teko:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <link href="../dist/output.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- TAOS -->
    <script>document.documentElement.classList.add('js')</script>
    <!-- flowbite -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
</head>

<body <?= $userEcho ?> >

    <!-- =========== NAVBAR =========== -->
<?php include '../src/components/navbar.php'; ?>
    <!-- =========== NAVBAR =========== -->

    <!-- =========== KONTEN =========== -->
    <label
        class="mx-auto mt-24 relative bg-white min-w-sm max-w-2xl flex flex-col md:flex-row items-center justify-center border py-2 px-2 rounded-2xl gap-2 shadow-2xl focus-within:border-gray-300"
        for="search-bar">
        <input id="search-bar" placeholder="Cari Pekerjaan..."
            class="px-6 py-2 w-full rounded-md flex-1 outline-none bg-white">
            <select name="filter" id="filterLoker" class=" p-2 rounded-xl border" required>
              <option value=""  selected>Filter</option>
                <?php 
                    $userQuery = "SELECT user_id, companyname FROM company";
                    $userResult = mysqli_query($conn, $userQuery);
                    if (mysqli_num_rows($userResult) > 0) {
                        while ($userRow = mysqli_fetch_assoc($userResult)) {
                            // Tentukan opsi yang dipilih berdasarkan keeper_id yang ada di database perangkat
                            echo '<option value="' . $userRow['user_id'] . '">' . $userRow['companyname'] . '</option>';
                        }
                    }
                ?>
            </select>
        <button class="srch-btn w-full md:w-auto px-6 py-3 bg-gray-800 border-black text-white fill-white active:scale-95 duration-100 border will-change-transform overflow-hidden relative rounded-xl transition-all disabled:opacity-70">
            <div class="relative">
    
                <!-- Loading animation change opacity to display -->
                <div
                    class="flex items-center justify-center h-3 w-3 absolute inset-1/2 -translate-x-1/2 -translate-y-1/2 transition-all">
                    <svg class="loading opacity-0 animate-spin w-full h-full" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                </div>
    
                <div class="srcBtn-txt flex items-center transition-all opacity-1 valid:"><span
                        class="text-sm font-semibold whitespace-nowrap truncate mx-auto">
                        Search
                    </span>
                </div>
    
            </div>
    
        </button>
    </label>



    <div class="bg-gray-100">
        <div class="container mx-auto py-8">
            <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">


<!-- =========== USER PROFILE SECTION =========== -->
<div class="col-span-4 sm:col-span-3">
    <div class="bg-white shadow rounded-lg p-6">
        <?php if (isset($_SESSION['user_id'])) { 
            $sqlProfile = "SELECT * FROM account WHERE user_id = '$userId'";
            $resultsProfile = mysqli_query($conn, $sqlProfile);
            if (mysqli_num_rows($resultsProfile) > 0) {
                while ($profile = mysqli_fetch_assoc($resultsProfile)) {
                    if ($profile['acctype'] == "user") {
                        $userSql = "SELECT * FROM users where user_id = '$userId'";
                        $userResult = mysqli_query($conn, $userSql);
                            while ($userRow = mysqli_fetch_assoc($userResult)) { $user = $userRow; }
                    } elseif ($profile['acctype'] == "company") {
                        $compantSql = "SELECT * FROM company where user_id = '$userId'";
                        $resultCompany = mysqli_query($conn, $compantSql);
                            while ($companyRow = mysqli_fetch_assoc($resultCompany)) { $company = $companyRow; }
                    }
                    ?>
                            <div class="flex flex-col items-center">
                            <img src="../src/uploads/profile/<?php echo ($profile['acctype'] == "user" ? $user['profile_img'] : $company['profile_img'] ); ?>" class="w-32 h-32 bg-gray-300 object-cover rounded-full mb-4 shrink-0">
                            <h1 class="text-xl font-bold capitalize">
                                <?php echo $profile['username']; ?></h1>
                            <p class="text-gray-600 capitalize"><?php echo ($profile['acctype'] == "user" ? $user['bio'] : $company['description']) ?></p>
                        </div>
                        <hr class="my-6 border-t border-gray-300">
                        <div class="flex flex-col">
                        <?php if($profile['acctype'] == 'user') { 
                            $getSkill = "SELECT * FROM skill WHERE user_id = '$userId'"; 
                            $resultSkill = mysqli_query($conn, $getSkill);
                            ?>
                            <span class="text-gray-600 uppercase font-bold tracking-wider mb-2">Skills</span>
                            <ul>
                                <?php if (mysqli_num_rows($resultSkill) > 0) {
                                while ($skill = mysqli_fetch_assoc($resultSkill))  {?>
                                <li class="mb-2 text-base capitalize"><?php echo $skill['level'] . ' ' . $skill['skillname']; ?></li>
                                <?php }} else { ?>
                                <li class="mb-2 text-base">Skill Belum Ditambah</li>
                                <?php }  ?>
                            </ul>
                        <?php } else { ?>
                            <span class="text-gray-600 uppercase font-bold tracking-wider mb-2">About Company</span>
                            <p class="text-gray-600 capitalize"><?php echo $company['about']; ?></p>
                        <?php   } ?>
                        </div>
                        <hr class="my-6 border-t border-gray-300">
                        <div class="mt-6 flex flex-wrap gap-4 justify-center">
                            <a href="../profile/">
                                <h1 class="text-sky-500 hover:text-sky-700">View My Profile</h1>
                            </a>
                        </div>                          
            <?php }
            }
        } else { ?>
            <h1 class="text-xl font-bold">Guest User</h1>
            <p class="text-gray-600">Please <a href="../login/">Log In</a></p>
        <?php } ?>
    </div>
</div>
<!-- =========== USER PROFILE SECTION =========== -->


                <div class="col-span-4 sm:col-span-9">

                    <!-- ORANG 1 -->
                    <div class="loker-container">

                        <?php 
                    
                    $sql = "SELECT l.*, c.*  FROM loker l JOIN company c ON l.company = c.user_id";
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
?>
                    <section class="mb-2 border  p-4 rounded-lg max-w-full bg-white">
                        <div class="mx-auto">
                            <div class="card md:flex max-w-full">
                                <div class="w-20 h-20 mx-auto mb-6 md:mr-6 flex-shrink-0">
                                    <img class="object-cover rounded-full" src="../src/uploads/profile/<?php echo $row['profile_img'] ?>">
                                </div>
                                <div class="flex-grow text-center md:text-left w-full">
                                <h3 class="text-xl heading capitalize"><?php echo $row['name'] ?></h3>
                                    <a href="../profile/?id=<?php echo $row['company'] ?>" class="font-medium capitalize"><?php echo $row['companyname'] ?></a>
                                    <p class="mt-2 mb-3"><?php echo $row['short_desc'] ?></p>
                                    <div>
                                        <!-- Modal toggle -->
                                        <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto gap-1">
                                        <?php 
                                        if ($acctype != 'company') {
                                            ?>
                                            <a href="ajukan.php?id=<?php echo $row['id'] ?>" 
                                            class="items-center text-center inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                            Ajukan Lamaran
                                            </a> 
                                            <?php
                                        }
                                        if ($row['company'] == $userId) {
                                                ?><a href="edit.php?id=<?php echo $row['id'] ?>" 
                                                    class="items-center text-center inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-sky-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-sky-500 focus:outline-none focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                                    Edit Loker
                                                    </a>
                                                    <a href="delete.php?id=<?php echo $row['id'] ?>" 
                                                    class="items-center text-center inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                                    Hapus Loker
                                                    </a>
                                                <?php 
                                                }
                                                ?>
                                                <button data-id="<?php echo $row['id'] ?>" data-modal-target="staticModal"  type="button"
                                                class="modal-dtl-btn inline-flex items-center justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                                    Detail Pekerjaan
                                                </button>
                                                </span>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                        </div>
                    </section>
                    <?php
                        }
                    }   

                    ?>
                    </div>


                    <!-- Main modal -->
                    <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="z-50 relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                    <h3 class="modal-title text-xl font-semibold text-gray-900 dark:text-white">
                                        Kafi Azhar Kurniawan | Cafe Nako's owner
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="staticModal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body p-6 space-y-6">
                                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                        Belakangan ini saya melihat banyak yang datang berkunjung ke cafe saya, Tapi saya hanya memiliki
                                        satu tukang parkir.
                                        maka dari itu bagi yang berkeinginan menjadi tukang parkir di cafe saya, silahkan melamar
                                    </p>
                                    <p class="text-bold leading-relaxed text-gray-500 dark:text-gray-400">
                                        Kriteria Pekerja :
                                    </p>
                                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                        - Laki-laki
                                    </p>
                                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                        - Usia 17-40 tahun
                                    </p>
                                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                        - Memiliki Adab, akhlak dan karakter 3B
                                    </p>
                                </div>
                                <!-- Modal footer -->
                                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                    <!-- <button data-modal-hide="staticModal" type="button"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Terima</button> -->
                                    <button data-modal-hide="staticModal" type="button"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Close</button>
                                </div>
                            </div>
                        </div>
                        <div modal-backdrop="" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div>
                    </div>
                    <!-- ORANG 1 -->


                </div>


            </div>
        </div>
    </div>
    <!-- =========== KONTEN =========== -->


    <script src="https://unpkg.com/taos@1.0.5/dist/taos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="../src/js/script.js"></script>
    <script src="../src/js/fetch.js"></script>
</body>

</html>
