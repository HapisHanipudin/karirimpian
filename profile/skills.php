<?php
include '../src/php/config.php';
include '../src/php/auth.php';

$activeTabs = 'profile';

if (!isset($_SESSION['user_id'])) {
    // Redirect the user to the login page
    header('Location: ../login'); // Ganti 'login.php' dengan halaman login yang sesungguhnya
    exit; // Hentikan skrip
} else {
    $userId = $_SESSION['user_id']; // Dapatkan ID pengguna

    // Handle the submission of the skills form
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = uniqid();
        $skillName = $_POST['skill_name'];
        $skillLevel = $_POST['skill_level'];

        // Validasi input (Anda bisa menambahkan validasi lebih rinci sesuai kebutuhan)
        $skillErrors = [];

        if (empty($skillName)) {
            $skillErrors[] = 'Skill Name cannot be empty.';
        }

        if (empty($skillErrors)) {
            // Simpan keahlian baru ke database (gantilah ini sesuai dengan struktur tabel Anda)
            $insertSkillSql = "INSERT INTO skill (id, user_id, skillname, level) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $insertSkillSql);
            mysqli_stmt_bind_param($stmt, "ssss", $id, $userId, $skillName, $skillLevel);

            if (mysqli_stmt_execute($stmt)) {
                // Redirect the user back to the skills page
                header('Location: skills.php');
                exit;
            } else {
                $skillErrors[] = "Database error: " . mysqli_error($conn);
            }
        }
    }

    // Ambil daftar keahlian pengguna
    $selectSkillsSql = "SELECT * FROM skill WHERE user_id = ?";
    $stmt = mysqli_prepare($conn, $selectSkillsSql);
    mysqli_stmt_bind_param($stmt, "s", $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $userSkills = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $userSkills[] = $row;
    }
}

?>
<!DOCTYPE html>
<html class="bg-slate-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit/Add Skills</title>
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
<body>
    <!-- Your navigation bar or header goes here -->
    <!-- =========== NAVBAR =========== -->
    <?php include '../src/components/navbar.php'; ?>
    <!-- =========== NAVBAR =========== -->

    <!-- =========== SKILLS FORM =========== -->
    <div class="container mx-auto py-20 mt-20 sm:mt-0 sm:py-8">
        <div class="flex justify-center px-4 h-screen items-center">
            <div class="grid col-start-1 col-end-4 sm:col-span-9 w-5/6">
                <section class="mb-2 border p-4 rounded-lg max-w-full bg-white">
                    <h1 class="text-2xl font-semibold mb-4">Edit/Add Skills</h1>
                    <form method="POST" action="">
                        <?php if (!empty($skillErrors)) : ?>
                            <div class="bg-red-100 text-red-700 p-2 mb-2 rounded">
                                <?php foreach ($skillErrors as $error) : ?>
                                    <p><?php echo $error; ?></p>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <div class="mt-4">
                            <label for="skill_name" class="text-base font-semibold">Skill Name</label>
                            <input type="text" name="skill_name" id="skill_name" class="mt-2 bg-white border-2 border-gray-800 text-gray-800 rounded-md">
                        </div>

                        <div class="mt-4">
                            <label for="skill_level" class="text-base font-semibold">Skill Level</label>
                            <select name="skill_level" id="skill_level" class="mt-2 py-2 px-4 bg-white border-2 border-gray-800 text-gray-800 rounded-md">
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Advanced">Advanced</option>
                                <option value="Expert">Expert</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <button class="bg-gray-800 rounded-lg text-white p-2 px-4" type="submit">Add Skill</button>
                        </div>
                    </form>

                    <!-- List of Skills -->
                    <h2 class="text-xl font-semibold mt-4">Your Skills:</h2>
                    <ul>
                        <?php foreach ($userSkills as $skill) : ?>
                            <li class="mt-2">
                                <span class="font-semibold"><?php echo $skill['skillname']; ?>:</span>
                                <span class="ml-2"><?php echo $skill['level']; ?></span>
                                <a href="delete_skill.php?skill_id=<?php echo $skill['id']; ?>" class="text-red-600 ml-2">Delete</a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </section>
            </div>
        </div>
    </div>
    <!-- =========== SKILLS FORM =========== -->

    <!-- Your footer or closing elements go here -->

    <!-- Your JavaScript scripts go here -->
    <script src="https://unpkg.com/taos@1.0.5/dist/taos.js"></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="../src/js/script.js"></script>
</body>
</html>
