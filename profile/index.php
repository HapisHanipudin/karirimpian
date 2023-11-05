<?php 
include '../src/php/config.php'; 
include '../src/php/auth.php'; 
$activeTabs = 'profile';

    ?>
<!doctype html>
<html class="bg-slate-100">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet">
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
        <link href="../dist/output.css" rel="stylesheet" />
        <title>User Profile</title>
    </head>
    
    <body <?php echo $userEcho; ?>>
        
    <!-- =========== NAVBAR =========== -->
    <?php include '../src/components/navbar.php'; ?>
    <!-- =========== NAVBAR =========== -->
    
    <!-- =========== KONTEN =========== -->
    <?php
    if (isset($_SESSION['user_id']) || isset($_GET['id'])) {
 if (isset($_GET['id'])) { 
    $id = $_GET['id'];
} else {
    $id = $_SESSION['user_id'];
}
    $sql = "SELECT * FROM account WHERE user_id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row["acctype"] == "user") {
        $profileSql = "SELECT * FROM users where user_id = '$id'";
        $profileResult = mysqli_query($conn, $profileSql);
    } elseif ($row["acctype"] == "company") {
        $profileSql = "SELECT * FROM company where user_id = '$id'";
        $profileResult = mysqli_query($conn, $profileSql);
    }
        while ($profileRow = mysqli_fetch_assoc($profileResult)) {
            $profile = $profileRow;
            ?>
    <div class="bg-gray-100">
        <div class="container mx-auto py-8">
            <div class="flex justify-center px-4 h-screen items-center">
                <div class="grid col-start-1 col-end-4 sm:col-span-9 w-5/6 ">
                    <section class="mb-2 border  p-4 rounded-lg max-w-full bg-white">
                        <div class="mx-auto">
                            <div class="flex card md:flex max-w-full">
                                <div class=" mx-auto md:mr-6 flex-grow-0 shrink-0">
                                    <img class="relative w-32 h-32 object-top object-cover rounded-full -translate-y-12"
                                    src="../src/uploads/profile/<?php echo $profile['profile_img'] ?>">
                                </div>
                                <div class="flex-grow text-center md:text-left">
                                    <h1 class="text-2xl font-semibold heading"><?php echo ($row['acctype'] === 'user' ? $profile['username'] : $profile['companyname']) ?></h1>
                                    <p class="mt-2 mb-3"><?php echo ($row['acctype'] === 'user') ? $profile['bio'] : $profile['description'] ?></p>
                                    
                                    <div>
                                        </div>
                                    </div>
                                    <div class="flex flex-row-reverse grow ">
                                        <?php if ($profile['user_id'] != $userId) { ?>
                                            <a href="../chat/?<?php echo $id; ?>" class="group w-32 h-10 flex items-center justify-center bg-gray-800 text-white relative cursor-pointer rounded-md border-none">
                                                <svg class="mr-2 animation-none group-hover:animate-bounce " width="25px" height="25px" viewBox="-2.4 -2.4 28.80 28.80" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                stroke="#ffffff" transform="rotate(0)">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.048">
                                                    </g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path d="M8 9H16" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path>
                                                        <path d="M8 12.5H13.5" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path>
                                                        <path
                                                        d="M13.0867 21.3877L13.7321 21.7697L13.0867 21.3877ZM13.6288 20.4718L12.9833 20.0898L13.6288 20.4718ZM10.3712 20.4718L9.72579 20.8539H9.72579L10.3712 20.4718ZM10.9133 21.3877L11.5587 21.0057L10.9133 21.3877ZM1.25 10.5C1.25 10.9142 1.58579 11.25 2 11.25C2.41421 11.25 2.75 10.9142 2.75 10.5H1.25ZM3.07351 15.6264C2.915 15.2437 2.47627 15.062 2.09359 15.2205C1.71091 15.379 1.52918 15.8177 1.68769 16.2004L3.07351 15.6264ZM7.78958 18.9915L7.77666 19.7413L7.78958 18.9915ZM5.08658 18.6194L4.79957 19.3123H4.79957L5.08658 18.6194ZM21.6194 15.9134L22.3123 16.2004V16.2004L21.6194 15.9134ZM16.2104 18.9915L16.1975 18.2416L16.2104 18.9915ZM18.9134 18.6194L19.2004 19.3123H19.2004L18.9134 18.6194ZM19.6125 2.7368L19.2206 3.37628L19.6125 2.7368ZM21.2632 4.38751L21.9027 3.99563V3.99563L21.2632 4.38751ZM4.38751 2.7368L3.99563 2.09732V2.09732L4.38751 2.7368ZM2.7368 4.38751L2.09732 3.99563H2.09732L2.7368 4.38751ZM9.40279 19.2098L9.77986 18.5615L9.77986 18.5615L9.40279 19.2098ZM13.7321 21.7697L14.2742 20.8539L12.9833 20.0898L12.4412 21.0057L13.7321 21.7697ZM9.72579 20.8539L10.2679 21.7697L11.5587 21.0057L11.0166 20.0898L9.72579 20.8539ZM12.4412 21.0057C12.2485 21.3313 11.7515 21.3313 11.5587 21.0057L10.2679 21.7697C11.0415 23.0767 12.9585 23.0767 13.7321 21.7697L12.4412 21.0057ZM10.5 2.75H13.5V1.25H10.5V2.75ZM21.25 10.5V11.5H22.75V10.5H21.25ZM7.8025 18.2416C6.54706 18.2199 5.88923 18.1401 5.37359 17.9265L4.79957 19.3123C5.60454 19.6457 6.52138 19.7197 7.77666 19.7413L7.8025 18.2416ZM1.68769 16.2004C2.27128 17.6093 3.39066 18.7287 4.79957 19.3123L5.3736 17.9265C4.33223 17.4951 3.50486 16.6678 3.07351 15.6264L1.68769 16.2004ZM21.25 11.5C21.25 12.6751 21.2496 13.5189 21.2042 14.1847C21.1592 14.8438 21.0726 15.2736 20.9265 15.6264L22.3123 16.2004C22.5468 15.6344 22.6505 15.0223 22.7007 14.2868C22.7504 13.5581 22.75 12.6546 22.75 11.5H21.25ZM16.2233 19.7413C17.4786 19.7197 18.3955 19.6457 19.2004 19.3123L18.6264 17.9265C18.1108 18.1401 17.4529 18.2199 16.1975 18.2416L16.2233 19.7413ZM20.9265 15.6264C20.4951 16.6678 19.6678 17.4951 18.6264 17.9265L19.2004 19.3123C20.6093 18.7287 21.7287 17.6093 22.3123 16.2004L20.9265 15.6264ZM13.5 2.75C15.1512 2.75 16.337 2.75079 17.2619 2.83873C18.1757 2.92561 18.7571 3.09223 19.2206 3.37628L20.0044 2.09732C19.2655 1.64457 18.4274 1.44279 17.4039 1.34547C16.3915 1.24921 15.1222 1.25 13.5 1.25V2.75ZM22.75 10.5C22.75 8.87781 22.7508 7.6085 22.6545 6.59611C22.5572 5.57256 22.3554 4.73445 21.9027 3.99563L20.6237 4.77938C20.9078 5.24291 21.0744 5.82434 21.1613 6.73809C21.2492 7.663 21.25 8.84876 21.25 10.5H22.75ZM19.2206 3.37628C19.7925 3.72672 20.2733 4.20752 20.6237 4.77938L21.9027 3.99563C21.4286 3.22194 20.7781 2.57144 20.0044 2.09732L19.2206 3.37628ZM10.5 1.25C8.87781 1.25 7.6085 1.24921 6.59611 1.34547C5.57256 1.44279 4.73445 1.64457 3.99563 2.09732L4.77938 3.37628C5.24291 3.09223 5.82434 2.92561 6.73809 2.83873C7.663 2.75079 8.84876 2.75 10.5 2.75V1.25ZM2.75 10.5C2.75 8.84876 2.75079 7.663 2.83873 6.73809C2.92561 5.82434 3.09223 5.24291 3.37628 4.77938L2.09732 3.99563C1.64457 4.73445 1.44279 5.57256 1.34547 6.59611C1.24921 7.6085 1.25 8.87781 1.25 10.5H2.75ZM3.99563 2.09732C3.22194 2.57144 2.57144 3.22194 2.09732 3.99563L3.37628 4.77938C3.72672 4.20752 4.20752 3.72672 4.77938 3.37628L3.99563 2.09732ZM11.0166 20.0898C10.8136 19.7468 10.6354 19.4441 10.4621 19.2063C10.2795 18.9559 10.0702 18.7304 9.77986 18.5615L9.02572 19.8582C9.07313 19.8857 9.13772 19.936 9.24985 20.0898C9.37122 20.2564 9.50835 20.4865 9.72579 20.8539L11.0166 20.0898ZM7.77666 19.7413C8.21575 19.7489 8.49387 19.7545 8.70588 19.7779C8.90399 19.7999 8.98078 19.832 9.02572 19.8582L9.77986 18.5615C9.4871 18.3912 9.18246 18.3215 8.87097 18.287C8.57339 18.2541 8.21375 18.2487 7.8025 18.2416L7.77666 19.7413ZM14.2742 20.8539C14.4916 20.4865 14.6287 20.2564 14.7501 20.0898C14.8622 19.936 14.9268 19.8857 14.9742 19.8582L14.2201 18.5615C13.9298 18.7304 13.7204 18.9559 13.5379 19.2063C13.3646 19.4441 13.1864 19.7468 12.9833 20.0898L14.2742 20.8539ZM16.1975 18.2416C15.7862 18.2487 15.4266 18.2541 15.129 18.287C14.8175 18.3215 14.5129 18.3912 14.2201 18.5615L14.9742 19.8582C15.0192 19.832 15.096 19.7999 15.2941 19.7779C15.5061 19.7545 15.7842 19.7489 16.2233 19.7413L16.1975 18.2416Z"
                                                        fill="#ffffff"></path>
                                                    </g>
                                                </svg>
                                                Message
                                            </a>
                                            <?php } else { ?>
                                                
                                    <a href="settings.php" class="group w-32 h-10 mr-3 flex items-center justify-center bg-white border-2 border-gray-800 text-white relative cursor-pointer rounded-md">
                                        <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#1f2937" class="mr-2 animate-none group-hover:animate-spin">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                d="M11 3H13C13.5523 3 14 3.44772 14 4V4.56879C14 4.99659 14.2871 5.36825 14.6822 5.53228C15.0775 5.69638 15.5377 5.63384 15.8403 5.33123L16.2426 4.92891C16.6331 4.53838 17.2663 4.53838 17.6568 4.92891L19.071 6.34312C19.4616 6.73365 19.4615 7.36681 19.071 7.75734L18.6688 8.1596C18.3661 8.46223 18.3036 8.92247 18.4677 9.31774C18.6317 9.71287 19.0034 10 19.4313 10L20 10C20.5523 10 21 10.4477 21 11V13C21 13.5523 20.5523 14 20 14H19.4312C19.0034 14 18.6318 14.2871 18.4677 14.6822C18.3036 15.0775 18.3661 15.5377 18.6688 15.8403L19.071 16.2426C19.4616 16.6331 19.4616 17.2663 19.071 17.6568L17.6568 19.071C17.2663 19.4616 16.6331 19.4616 16.2426 19.071L15.8403 18.6688C15.5377 18.3661 15.0775 18.3036 14.6822 18.4677C14.2871 18.6318 14 19.0034 14 19.4312V20C14 20.5523 13.5523 21 13 21H11C10.4477 21 10 20.5523 10 20V19.4313C10 19.0034 9.71287 18.6317 9.31774 18.4677C8.92247 18.3036 8.46223 18.3661 8.1596 18.6688L7.75732 19.071C7.36679 19.4616 6.73363 19.4616 6.34311 19.071L4.92889 17.6568C4.53837 17.2663 4.53837 16.6331 4.92889 16.2426L5.33123 15.8403C5.63384 15.5377 5.69638 15.0775 5.53228 14.6822C5.36825 14.2871 4.99659 14 4.56879 14H4C3.44772 14 3 13.5523 3 13V11C3 10.4477 3.44772 10 4 10L4.56877 10C4.99658 10 5.36825 9.71288 5.53229 9.31776C5.6964 8.9225 5.63386 8.46229 5.33123 8.15966L4.92891 7.75734C4.53838 7.36681 4.53838 6.73365 4.92891 6.34313L6.34312 4.92891C6.73365 4.53839 7.36681 4.53839 7.75734 4.92891L8.15966 5.33123C8.46228 5.63386 8.9225 5.6964 9.31776 5.53229C9.71288 5.36825 10 4.99658 10 4.56876V4C10 3.44772 10.4477 3 11 3Z"
                                                stroke="rgb(31 41 55)" stroke-width="1.5"></path>
                                                <path
                                                d="M14 12C14 13.1046 13.1046 14 12 14C10.8954 14 10 13.1046 10 12C10 10.8954 10.8954 10 12 10C13.1046 10 14 10.8954 14 12Z"
                                                stroke="rgb(31 41 55)" stroke-width="1.5"></path>
                                            </g>
                                        </svg>
                                        <span class="text-gray-800 font-medium">Settings</span>
                                    </a>
                                <?php } ?>
                                </div>
                                
                            </div>
                            
                            <!-- ISI -->
                            <div class="flex">
                                <div class="w-1/2">
                                    <?php if ($row['acctype'] == 'user') { ?>
                                    <div class="p-3 bg-slate-100 rounded-md">
                                        <h1 class="font-bold text-xl rounded-md">Pengalaman</h1>
                                        <p><?php echo $profile['experience']; ?></p>
                                    </div>
                                <?php } ?>
                                    <div class="<?php echo (($row['acctype'] == 'user') ? 'mt-2' : '') ?> p-3 bg-slate-100 rounded-md">
                                        <h1 class="font-bold text-base rounded-md">Tentang</h1>
                                        <p class="mb-3">
                                            <?php echo $profile['about']; ?>
                                        </p>
                                    </div>
                                </div>
                                
                                
                                <div class="w-1/2 ml-6">
                                    <div class="p-3 bg-slate-100 rounded-md flex flex-col gap-4">
                                        <?php if ($row['acctype'] == 'user') { ?>
                                        <div>
                                        <h1 class="text-base font-semibold rounded-md ">Skill</h1>
                                        <div class="flex gap-2 flex-wrap mx-auto">
                                        <?php 
                                            $skillSql = "SELECT * FROM skill WHERE user_id = '$id'";
                                            $skillResult = mysqli_query($conn, $skillSql);
                                            if (mysqli_num_rows($skillResult) > 0) {
                                                while ($skillRow = mysqli_fetch_assoc($skillResult)) { ?>
                                            <span class="border-2 hover:scale-105 ease-in-out duration-75 border-gray-800 rounded-full text-center px-2 justify-center w-max">
                                                <button class="text-sm"><?php echo $skillRow['level']. ' ' . $skillRow['skillname']; ?></button>
                                            </span>
                                            <?php } } else { ?>
                                            <span class="border-2 hover:scale-105 ease-in-out duration-75 border-gray-800 rounded-full text-center px-2 justify-center w-max">
                                                <button class="text-sm">Skill belum ditambahkan</button>
                                            </span>
                                            <?php } ?>
                                        </div>
                                        </div>
                                        <?php } //else { ?>
                                        <!-- <h1 class="text-base font-semibold rounded-md ">Tags</h1>
                                        <div class="flex gap-2 flex-wrap mx-auto">
                                            <a href="" class="border-2 hover:scale-105 ease-in-out duration-75 border-gray-800 rounded-full text-center px-2 justify-center w-max">
                                                <button class="text-sm">#Wanitakarir</button>
                                            </a>
                                            <a href="" class="border-2 hover:scale-105 ease-in-out duration-75 border-gray-800 rounded-full text-center px-2 justify-center w-max">
                                                <button class="text-sm">#TheGreen</button>
                                            </a>
                                            <a href="" class="border-2 hover:scale-105 ease-in-out duration-75 border-gray-800 rounded-full text-center px-2 justify-center w-max">
                                                <button class="text-sm">#SwimmingPool</button>
                                            </a>
                                            <a href="" class="border-2 hover:scale-105 ease-in-out duration-75 border-gray-800 rounded-full text-center px-2 justify-center w-max">
                                                <button class="text-sm">#PekerjaKeras</button>
                                            </a>
                                        </div> -->
                                        <?php //} ?>
                                        <div>
                                            <h1 class="text-base font-semibold rounded-md ">Alamat</h1>
                                            <p class="flex">
                                                <!-- <svg width="30px" height="30px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--emojione mr-2"
                                                preserveAspectRatio="xMidYMid meet" fill="#ffffff" stroke="#ffffff">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path d="M31.8 62c16.6 0 30-13.4 30-30h-60c0 16.6 13.4 30 30 30" fill="#f9f9f9"></path>
                                                    <path d="M31.8 2c-16.6 0-30 13.4-30 30h60c0-16.6-13.4-30-30-30" fill="#ed4c5c"></path>
                                                </g>
                                            </svg> -->
                                        <?php echo $profile['address']; ?>
                                        </p>
                                        </div>

                                <?php if ($row['acctype'] == 'user') { ?>
                                        <div>
                                        <h1 class="text-base font-semibold rounded-md ">Instagram</h1>
                                        <p class="flex">
                                            <a href="https://www.instagram.com/<?php echo $profile['instagram']; ?>/" class="flex group"><?php echo $profile['instagram']; ?>
                                                <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" class="ml-1 animate-none group-hover:animate-bounce delay-0 hover:delay-300" xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path d="M7 17L17 7M17 7H8M17 7V16" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    </g>
                                                </svg>
                                            </a>
                                        </p>
                                        </div>
                                <?php } ?>
                                        <div>
                                        <h1 class="text-base font-semibold rounded-md ">Email</h1>
                                        <p class="flex">
                                            <a href="mailto:<?php echo $profile['email']; ?>" class="group flex"><?php echo $profile['email']; ?>
                                            <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none"
                                            class="ml-1 animate-none group-hover:animate-bounce delay-0 hover:delay-300" xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path d="M7 17L17 7M17 7H8M17 7V16" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                            </a>
                                        </p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <?php if ($row['acctype'] == 'company') { ?>
                            <div class="bg-slate-100 flex flex-col  mt-2 rounded-md">
                                <h2 class="text-base font-semibold rounded-md mb-2 pt-4 pl-4">Pekerja</h2>
                                <!-- <hr> -->
                                <div class="flex flex-col justify-center h-36 overflow-scroll pt-4">

                                    <?php 
                                $workerSQL = "SELECT w.*, u.* FROM worker w JOIN users u ON w.user_id = u.user_id WHERE company_id = '$id'";
                                $workerResult = mysqli_query($conn, $workerSQL);
                                
                                if (mysqli_num_rows($workerResult) > 0) {
                                    while ($worker = mysqli_fetch_assoc($workerResult)) {  ?>
                                    <hr>
                                    <div class="rounded-md flex w-full  p-4 items-center gap-3">
                                        <div class="">
                                            <img src="../src/uploads/profile/<?php echo $worker['profile_img']; ?>" class="w-14 h-14 object-top object-cover rounded-full">
                                        </div>
                                        
                                        <div class="">
                                            <a href="../profile/?id=<?php echo $worker['user_id']; ?>" class="font-semibold text-base"><?php echo $worker['username']; ?></a>
                                            <p class="text-gray-600 text-sm"><?php echo $worker['work_name']; ?></p>
                                        </div>
                                        <div class="flex flex-grow flex-row-reverse">
                                            <a href="../profile/?id=<?php echo $worker['user_id']; ?>" class=" text-white bg-slate-800 py-1 px-3 rounded-md">Visit Profile</a>
                                        </div>
                    </div>
                    <?php } } else {  ?>
                        <h1 class="text-slate-500 self-center">Belum Memiliki Pekerja</h1>
                        <?php }?>
                    </div>
                            </div>
                            <?php }  ?>
                        </div>
                    </section>


                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <?php } else { ?>
        <section class="flex h-screen justify-center items-center">
            <div class="flex-grow text-center justify-center items-center">
                <h1 class="text-3xl font-bold">Anda Belum Login</h1>
                <button class="login-mdl-btn relative base py-1 px-3 rounded-full border bg-gray-800 border-black text-white fill-white active:scale-95 duration-100">
                    Log In
                </button>
            </div>
        </section>
    <?php } ?>
    <!-- =========== KONTEN =========== -->
    

    
    
    
    <script src="https://unpkg.com/taos@1.0.5/dist/taos.js"></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="../src/js/script.js"></script>
</body>

</html>