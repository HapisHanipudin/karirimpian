<?php 
include '../src/php/config.php'; 
include '../src/php/auth.php'; 
$activeTabs = 'profile';

if (!isset($_SESSION['user_id'])) {
    // Redirect the user to the login page
    header('Location: ../login'); // Change 'login.php' to the actual login page
    exit; // Terminate the script
} else {
    $userId = $_SESSION['user_id']; // Added to get the user's ID

    $sql = "SELECT * FROM account WHERE user_id = '$userId'";
    $result = mysqli_query($conn, $sql);
    $profile = null; // Initialize the $profile variable

    if ($row = mysqli_fetch_assoc($result)) {
        if ($row['acctype'] == 'user') {
            $sqlUser = "SELECT * FROM users WHERE user_id = '$userId'";
            $user = mysqli_query($conn, $sqlUser);

            $profile = mysqli_fetch_assoc($user);
        } elseif ($row['acctype'] == 'company') {
            $sqlCompany = "SELECT * FROM company WHERE user_id = '$userId'";
            $company = mysqli_query($conn, $sqlCompany);

            $profile = mysqli_fetch_assoc($company);
        }
    }

    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validasi dan proses form jika ada pengiriman
        $newUsername = $_POST['username'];
        $newBio = $_POST['bio'];
        $newExperience = $_POST['experience'];
        $newAbout = $_POST['about'];
        $newAddress = $_POST['address'];
        $newInstagram = $_POST['instagram'];


        // Validasi input (You can add more detailed validation as needed)
        $errors = [];

        if (empty($newUsername)) {
            $errors[] = 'Username cannot be empty.';
        }

        // Continue with other validation

        if (empty($errors)) {
            // Update user settings in the database
            if ($row['acctype'] == 'user') {
                $updateAcc = "UPDATE account SET username = ?, ";
                $updateUserSql = "UPDATE users SET username = ?, bio = ?, experience = ?, about = ?, address = ?, instagram = ? WHERE user_id = ?";
                $stmt = mysqli_prepare($conn, $updateUserSql);
                mysqli_stmt_bind_param($stmt, "sssssss", $newUsername, $newBio, $newExperience, $newAbout, $newAddress, $newInstagram, $userId);
            } elseif ($row['acctype'] == 'company') {
                $updateCompanySql = "UPDATE company SET companyname = ?, description = ?, address = ?, about = ? WHERE user_id = ?";
                $stmt = mysqli_prepare($conn, $updateCompanySql);
                mysqli_stmt_bind_param($stmt, "sssss", $newUsername, $newBio, $newExperience, $newAbout, $userId);
            }

            if (mysqli_stmt_execute($stmt)) {
                // Handle profile image upload
                if (isset($_FILES['profile_img']) && $_FILES['profile_img']['error'] === UPLOAD_ERR_OK) {
                    $targetDir = "../src/uploads/profile/";
                    $targetFile = $targetDir . $_SESSION['user_id'];

                    if (move_uploaded_file($_FILES["profile_img"]["tmp_name"], $targetFile)) {
                        // File successfully uploaded, you can save the file name in the database
                        $profileImgName = $_SESSION['user_id'];

                        if ($row['acctype'] == 'user') {
                            $updateImageSql = "UPDATE users SET profile_img = ? WHERE user_id = ?";
                        } elseif ($row['acctype'] == 'company') {
                            $updateImageSql = "UPDATE company SET profile_img = ? WHERE user_id = ?";
                        }

                        $stmt = mysqli_prepare($conn, $updateImageSql);
                        mysqli_stmt_bind_param($stmt, "ss", $profileImgName, $userId);
                        mysqli_stmt_execute($stmt);
                    } else {
                        // Failed to upload the file, handle the error message here
                        $errors[] = "Sorry, there was an error uploading the image.";
                    }
                }
                // Redirect the user to the profile page or another appropriate page
                header('Location: index.php'); // Change 'index.php' to the actual profile page
                exit;
            } else {
                $errors[] = "Database error: " . mysqli_error($conn);
            }
        }
    }
}

?>

<!doctype html>
<html class="bg-slate-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <!-- TAOS -->
    <script>document.documentElement.classList.add('js')</script>
    <!-- flowbite -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Teko:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <link href="../dist/output.css" rel="stylesheet" />
</head>

<body <?php echo $userEcho; ?>>

    <!-- =========== NAVBAR =========== -->
    <?php include '../src/components/navbar.php'; ?>
    <!-- =========== NAVBAR =========== -->

    <!-- =========== SETTINGS FORM =========== -->
<div class="bg-gray-100">
        <div class="container mx-auto py-20 mt-20 sm:mt-0 sm:py-8">
            <div class="flex justify-center px-4 h-screen items-center">
                <div class="grid col-start-1 col-end-4 sm:col-span-9 w-5/6">
                    <section class="mb-2 border p-4 rounded-lg max-w-full bg-white">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <?php if (!empty($errors)) : ?>
                                <div class="bg-red-100 text-red-700 p-2 mb-2 rounded">
                                    <?php foreach ($errors as $error) : ?>
                                        <p><?php echo $error; ?></p>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <div class="flex card md:flex max-w-full flex-wrap">
                                <div class=" mx-auto md:mr-6 flex-grow-0 shrink-0">
                                    <img class="relative w-32 h-32 object-top object-cover rounded-full -translate-y-12"
                                    src="../src/uploads/profile/<?php echo $profile['profile_img'] ?>">
                                </div>
                                <div class="flex-grow text-center sm:text-left">
                                    <label for="bio" class="text-2xl font-semibold heading">Username</label> </br>
                                    <input type="text" name="username" id="username" value="<?php echo (($row['acctype'] == 'user') ? $profile['username'] : $profile['companyname']) ?>" class="mt-2 mb-3 bg-white border-2 border-gray-800 text-gray-800  rounded-md "> </br>
                                    <label for="bio" class="text-xl font-semibold heading"><?php echo (($row['acctype'] == 'user') ? 'Bio' : 'Deskripsi') ?></label> </br>
                                    <input type="text" name="bio" id="bio" value="<?php echo (($row['acctype'] == 'user') ? $profile['bio'] : $profile['description']) ?>" class="mt-2 mb-3 text-sm bg-white border-2 border-gray-800 text-gray-800  rounded-md ">
                                    

                                    </div>
                                    <div class="flex justify-center sm:justify-normal sm:flex-row-reverse grow ">

                                    <input type="file" name="profile_img" id="profile_img" class=" h-10 mr-3 mb-4 flex items-center justify-center bg-white border-2 border-gray-800 text-gray-800 font-medium cursor-pointer rounded-md">
                                </div>
                                
                            </div>
                            
                            <!-- ISI -->
                            <div class="flex">
                                <div class="w-1/2">
                                    <?php if ($row['acctype'] == 'user') { ?>
                                    <div class="p-3 bg-slate-100 rounded-md">
                                        <label class="font-bold text-xl rounded-md" for="experience">Pengalaman</label> </br>
                                        <input class="mt-2 rounded-md w-full" type="text" id="experience" name="experience" value="<?php echo $profile['experience']; ?>"> </br>
                                    </div>
                                    <?php } ?>
                                    <div class="mt-2 p-3 bg-slate-100 rounded-md">
                                        <label class="font-bold text-base rounded-md" for="about"><?php echo (($row['acctype'] == 'user') ? 'Tentang Saya' : 'Tentang Kami') ?></label>  </br>
                                        <textarea class="mt-2 rounded-md w-full p-2" cols="30" rows="10" id="about" name="about"><?php echo $profile['about']; ?></textarea> </br>
                                    </div>
                                </div>
                                
                                
                                <div class="w-1/2 ml-6">
                                    <div class="p-3 bg-slate-100 rounded-md">
                                        <h1 class="text-base font-semibold rounded-md mb-2">Skills</h1>
                                        <div class="flex gap-2 flex-wrap mx-auto mb-4">
                                        <?php 
                                            $skillSql = "SELECT * FROM skill WHERE user_id = '$userId'";
                                            $skillResult = mysqli_query($conn, $skillSql);
                                            if (mysqli_num_rows($skillResult) > 0) {
                                                while ($skillRow = mysqli_fetch_assoc($skillResult)) { ?>
                                            <span class="border-2 hover:scale-105 ease-in-out duration-75 border-gray-800 rounded-full text-center px-2 justify-center w-max">
                                                <button class="text-sm"><?php echo $skillRow['level'] . $skillRow['skillname']; ?></button>
                                            </span>
                                            <?php } } else { ?>
                                            <span class="border-2 hover:scale-105 ease-in-out duration-75 border-gray-800 rounded-full text-center px-2 justify-center w-max">
                                                <button class="text-sm">Skill belum ditambahkan</button>
                                            </span>
                                            <?php } ?>
                                            <span class="border-2 hover:scale-105 ease-in-out duration-75 border-gray-800 rounded-full text-center px-2 justify-center w-max">
                                                <a href="skills.php" class="text-sm">Atur Skill</a>
                                            </span>
                                        </div>

                                        <label for="address" class="text-base font-semibold rounded-md mb-2 ">Alamat</label> </br>
                                        <input class="mt-2 mb-4 rounded-md w-full" type="text" id="address" name="address" value="<?php echo $profile['address']; ?>"> </br>

                                        <?php if ($row['acctype'] == 'user') { ?>
                                        <label for="instagram" class="text-base font-semibold rounded-md mb-2 mt-4">Instagram</label> </br> 
                                        <input type="text" id="instagram" name="instagram" value="<?php echo $profile['instagram']; ?>" class="mt-2 mb-4 rounded-md w-full"> </br>
                                        <?php } ?>
                                        
                                        <label for="email" class="text-base font-semibold rounded-md mb-2 mt-4">Email</label> </br>
                                        <input type="text" id="email" name="email" value="<?php echo $profile['email'];;?>" class="mt-2 mb-4 rounded-md w-full"> </br>
                                    </div>
                                </div>
                            </div>

                            <button class="mt-4 bg-gray-800 rounded-lg  text-white p-2 px-4" type="submit">Update Settings</button>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- =========== SETTINGS FORM =========== -->

    <script src="https://unpkg.com/taos@1.0.5/dist/taos.js"></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="../src/js/script.js"></script>
</body>

</html>
