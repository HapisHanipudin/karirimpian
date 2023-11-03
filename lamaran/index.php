<?php include '../src/php/config.php'; include '../src/php/auth.php'; $activeTabs = 'lamaran'; ?>

<!doctype html>
<html class="bg-slate-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lamaran</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Teko:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet"
    href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- TAOS -->
    <script>document.documentElement.classList.add('js')</script>
    <!-- flowbite -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <link href="../dist/output.css" rel="stylesheet">
</head>

<body>

    <!-- =========== NAVBAR =========== -->
<?php include '../src/components/navbar.php'; ?>
    <!-- =========== NAVBAR =========== -->

<?php if (isset($_SESSION['user_id'])) { ?>
    <!-- =========== NOTIFIKASI =========== -->
    <div class="bg-gray-100 flex min-h-screen justify-center align">
        <div class="container  py-8">
            <div class="flex px-4">
                <div class="col-start-1 col-end-4 sm:col-span-9 mt-16 w-full">
                    <div class="flex">
                    <h1 class="font-semibold text-2xl mb-5 mr-2">Lamaran</h1>
                    <!-- <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M9.00195 17H5.60636C4.34793 17 3.71872 17 3.58633 16.9023C3.4376 16.7925 3.40126 16.7277 3.38515 16.5436C3.37082 16.3797 3.75646 15.7486 4.52776 14.4866C5.32411 13.1835 6.00031 11.2862 6.00031 8.6C6.00031 7.11479 6.63245 5.69041 7.75766 4.6402C8.88288 3.59 10.409 3 12.0003 3C13.5916 3 15.1177 3.59 16.2429 4.6402C17.3682 5.69041 18.0003 7.11479 18.0003 8.6C18.0003 11.2862 18.6765 13.1835 19.4729 14.4866C20.2441 15.7486 20.6298 16.3797 20.6155 16.5436C20.5994 16.7277 20.563 16.7925 20.4143 16.9023C20.2819 17 19.6527 17 18.3943 17H15.0003M9.00195 17L9.00031 18C9.00031 19.6569 10.3435 21 12.0003 21C13.6572 21 15.0003 19.6569 15.0003 18V17M9.00195 17H15.0003"
                                stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                    </svg> -->
                    </div>
    <?php 
        $lamaranQuery = "SELECT l.*, u.*, j.* FROM lamaran l JOIN users u ON l.user_id = u.user_id JOIN loker j ON l.job_id = j.id WHERE l.company = '$userId' and l.status = 'pending'";
        $lamaranResult = mysqli_query($conn, $lamaranQuery);
        $lamaranCount = mysqli_num_rows($lamaranResult);
        if ($lamaranCount > 0) {
            while ($lamaran = mysqli_fetch_assoc($lamaranResult)) {
    ?>
    
    <section class="mb-2 border bg-white p-4 rounded-lg w-full ">
        <div class="w-full">
            <div class="flex card md:flex w-full">
                <div class=" mx-auto md:mr-6 flex-grow-0 shrink-0">
                    <img class="relative w-24 h-24 object-top object-cover rounded-full"
                    src="../src/uploads/profile/<?php echo $lamaran['profile_img'] ?>">
                </div>
                <div class="flex-grow text-center justify-center items-center md:text-left">
                    <p class="font-display text-2xl  text-black mt-5" itemprop="author">
                        <a href="../profile/?id=<?php echo $lamaran['user_id']; ?>" class="font-bold hover:underline" rel="author"><?php echo $lamaran['username']; ?></a>
                        <span> melamar untuk</span>
                        <span class="font-bold"> <?php echo $lamaran['name']; ?></span>
                    </p>
                    <div class=" prose prose-sm text-gray-400">
                        <p><?php echo $lamaran['time']; ?></p>
                    </div>
                    <div>
                        </div>
                    </div>
                    <div class="flex flex-row-reverse grow text-center justify-start mr-5 items-center">
                        <a href="accept.php?id=<?php echo $lamaran['lamaran_id']; ?>" class="w-32 h-10 flex items-center justify-center bg-green-500 hover:bg-green-600 text-white font-medium relative cursor-pointer rounded-md border-none">
                            <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M3 12L9 18L21 6" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                    </g>
                                </svg>
                                Terima
                            </a>
                            
                            <a href="decline.php?id=<?php echo $lamaran['lamaran_id']; ?>" class="w-32 h-10 mr-3 flex items-center justify-center bg-red-500 hover:bg-red-600 text-white font-medium relative cursor-pointer rounded-md">
                                <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M19 5L4.99998 19M5.00001 5L19 19" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                                Tolak
                            </a>
                        </div>
                        
                    </div>
                </div>
            </section>
            <?php   
        
         } } else { echo "Tidak ada lamaran"; } ?>

        </div>
    </div>
                <div class="flex px-4">
                <div class="col-start-1 col-end-4 sm:col-span-9 mt-16 w-full">
                    <div class="flex">
                    <h1 class="font-semibold text-2xl mb-5 mr-2">Lamaran Diterima</h1>
                    <!-- <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M9.00195 17H5.60636C4.34793 17 3.71872 17 3.58633 16.9023C3.4376 16.7925 3.40126 16.7277 3.38515 16.5436C3.37082 16.3797 3.75646 15.7486 4.52776 14.4866C5.32411 13.1835 6.00031 11.2862 6.00031 8.6C6.00031 7.11479 6.63245 5.69041 7.75766 4.6402C8.88288 3.59 10.409 3 12.0003 3C13.5916 3 15.1177 3.59 16.2429 4.6402C17.3682 5.69041 18.0003 7.11479 18.0003 8.6C18.0003 11.2862 18.6765 13.1835 19.4729 14.4866C20.2441 15.7486 20.6298 16.3797 20.6155 16.5436C20.5994 16.7277 20.563 16.7925 20.4143 16.9023C20.2819 17 19.6527 17 18.3943 17H15.0003M9.00195 17L9.00031 18C9.00031 19.6569 10.3435 21 12.0003 21C13.6572 21 15.0003 19.6569 15.0003 18V17M9.00195 17H15.0003"
                                stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                    </svg> -->
                    </div>
    <?php 
        $lamaranQuery = "SELECT l.*, u.*, j.* FROM lamaran l JOIN users u ON l.user_id = u.user_id JOIN loker j ON l.job_id = j.id WHERE l.company = '$userId' and l.status = 'accepted'";
        $lamaranResult = mysqli_query($conn, $lamaranQuery);
        $lamaranCount = mysqli_num_rows($lamaranResult);
        if ($lamaranCount > 0) {
            while ($lamaran = mysqli_fetch_assoc($lamaranResult)) {
    ?>
    
    <section class="mb-2 border bg-white p-4 rounded-lg w-full ">
        <div class="w-full">
            <div class="flex card md:flex w-full">
                <div class=" mx-auto md:mr-6 flex-grow-0 shrink-0">
                    <img class="relative w-24 h-24 object-top object-cover rounded-full"
                    src="../src/uploads/profile/<?php echo $lamaran['profile_img'] ?>">
                </div>
                <div class="flex-grow text-center justify-center items-center md:text-left">
                    <p class="font-display text-2xl  text-black mt-5" itemprop="author">
                        <span> Anda menerima lamaran </span>
                        <a href="../profile/?id=<?php echo $lamaran['user_id']; ?>" class="font-bold hover:underline" rel="author"><?php echo $lamaran['username']; ?></a>
                        <span> untuk pekerjaan </span>
                        <span class="font-bold"> <?php echo $lamaran['name']; ?></span>
                    </p>
                    <div class=" prose prose-sm text-gray-400">
                        <p><?php echo $lamaran['time']; ?></p>
                    </div>
                    <div>
                        </div>
                    </div>
                    <!-- <div class="flex flex-row-reverse grow text-center justify-start mr-5 items-center">
                        <a href="accept.php?id=<?php echo $lamaran['lamaran_id']; ?>" class="w-32 h-10 flex items-center justify-center bg-green-500 hover:bg-green-600 text-white font-medium relative cursor-pointer rounded-md border-none">
                            <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M3 12L9 18L21 6" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                    </g>
                                </svg>
                                Terima
                            </a>
                            
                            <a href="decline.php?id=<?php echo $lamaran['lamaran_id']; ?>" class="w-32 h-10 mr-3 flex items-center justify-center bg-red-500 hover:bg-red-600 text-white font-medium relative cursor-pointer rounded-md">
                                <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M19 5L4.99998 19M5.00001 5L19 19" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                                Tolak
                            </a>
                        </div> -->
                        
                    </div>
                </div>
            </section>
            <?php    } } else { echo "Tidak ada lamaran"; } ?>

        </div>
    </div>
                    <div class="flex px-4">
                <div class="col-start-1 col-end-4 sm:col-span-9 mt-16 w-full">
                    <div class="flex">
                    <h1 class="font-semibold text-2xl mb-5 mr-2">Lamaran Diterima</h1>
                    <!-- <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M9.00195 17H5.60636C4.34793 17 3.71872 17 3.58633 16.9023C3.4376 16.7925 3.40126 16.7277 3.38515 16.5436C3.37082 16.3797 3.75646 15.7486 4.52776 14.4866C5.32411 13.1835 6.00031 11.2862 6.00031 8.6C6.00031 7.11479 6.63245 5.69041 7.75766 4.6402C8.88288 3.59 10.409 3 12.0003 3C13.5916 3 15.1177 3.59 16.2429 4.6402C17.3682 5.69041 18.0003 7.11479 18.0003 8.6C18.0003 11.2862 18.6765 13.1835 19.4729 14.4866C20.2441 15.7486 20.6298 16.3797 20.6155 16.5436C20.5994 16.7277 20.563 16.7925 20.4143 16.9023C20.2819 17 19.6527 17 18.3943 17H15.0003M9.00195 17L9.00031 18C9.00031 19.6569 10.3435 21 12.0003 21C13.6572 21 15.0003 19.6569 15.0003 18V17M9.00195 17H15.0003"
                                stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                    </svg> -->
                    </div>
    <?php 
        $lamaranQuery = "SELECT l.*, u.*, j.* FROM lamaran l JOIN users u ON l.user_id = u.user_id JOIN loker j ON l.job_id = j.id WHERE l.company = '$userId' and l.status = 'declined'";
        $lamaranResult = mysqli_query($conn, $lamaranQuery);
        $lamaranCount = mysqli_num_rows($lamaranResult);
        if ($lamaranCount > 0) {
            while ($lamaran = mysqli_fetch_assoc($lamaranResult)) {
    ?>
    
    <section class="mb-2 border bg-white p-4 rounded-lg w-full ">
        <div class="w-full">
            <div class="flex card md:flex w-full">
                <div class=" mx-auto md:mr-6 flex-grow-0 shrink-0">
                    <img class="relative w-24 h-24 object-top object-cover rounded-full"
                    src="../src/uploads/profile/<?php echo $lamaran['profile_img'] ?>">
                </div>
                <div class="flex-grow text-center justify-center items-center md:text-left">
                    <p class="font-display text-2xl  text-black mt-5" itemprop="author">
                        <span> Anda menolak lamaran </span>
                        <a href="../profile/?id=<?php echo $lamaran['user_id']; ?>" class="font-bold hover:underline" rel="author"><?php echo $lamaran['username']; ?></a>
                        <span> untuk pekerjaan </span>
                        <span class="font-bold"> <?php echo $lamaran['name']; ?></span>
                    </p>
                    <div class=" prose prose-sm text-gray-400">
                        <p><?php echo $lamaran['time']; ?></p>
                    </div>
                    <div>
                        </div>
                    </div>
                    <!-- <div class="flex flex-row-reverse grow text-center justify-start mr-5 items-center">
                        <a href="accept.php?id=<?php echo $lamaran['lamaran_id']; ?>" class="w-32 h-10 flex items-center justify-center bg-green-500 hover:bg-green-600 text-white font-medium relative cursor-pointer rounded-md border-none">
                            <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M3 12L9 18L21 6" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                    </g>
                                </svg>
                                Terima
                            </a>
                            
                            <a href="decline.php?id=<?php echo $lamaran['lamaran_id']; ?>" class="w-32 h-10 mr-3 flex items-center justify-center bg-red-500 hover:bg-red-600 text-white font-medium relative cursor-pointer rounded-md">
                                <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M19 5L4.99998 19M5.00001 5L19 19" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                                Tolak
                            </a>
                        </div> -->
                        
                    </div>
                </div>
            </section>
            <?php    } } else { echo "Tidak ada lamaran"; } ?>

        </div>
    </div>
</div>
</div>
<?php } ?>

    
    <!-- =========== NOTIFIKASI =========== -->


    <script src="https://unpkg.com/taos@1.0.5/dist/taos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="../src/js/script.js"></script>
</body>

</html>