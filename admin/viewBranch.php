<?php

    include "../libs/load.php";

    // Start a session
    Session::start();

    if (!Session::get('login_user'))
    {
        header("Location: index.php");
        exit;
    }

    $users = Operations::getBranchUsers();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <?php include "temp/head.php" ?>

    </head>

    <body>

        <?php include "temp/header.php" ?>

        <div id="content">

            <?php include "temp/sideheader.php" ?>

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Branch Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($users)): ?>
                                                <?php foreach ($users as $u): ?>
                                                    <tr>
                                                        <td><?= htmlspecialchars($u['username']) ?></td>
                                                        <td><?= htmlspecialchars($u['password']) ?></td>
                                                        <td><?= htmlspecialchars($u['branch']) ?></td>
                                                        <td>
                                                            <a href="branchInfo.php?data=<?= $u['branch'] ?>" class="btn btn-square btn-outline-secondary me-2">
                                                                View
                                                            </a>
                                                            <a href="editBranch.php?edit_id=<?= $u['id'] ?>" class="btn btn-square btn-outline-info me-2">
                                                                Edit
                                                            </a>
                                                            <a href="deleteBranch.php?delete_id=<?= $u['id'] ?>" class="btn btn-square btn-outline-danger">
                                                                Delete
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="2" class="text-muted text-center">No data found!</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php include "temp/footer.php"; ?>

    </body>
</html>