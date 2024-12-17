<?php
$number1 = 1;
$number = 1;

if (!defined('SECURE_ACCESS')) {
    die('DIRECT IS NOT PERMITTED');
}
include('templates/header.php') ?>

<div class="main-content bg-white">
    <h1 class="d-flex justify-content-center">PEMINJAMAN</h1>
    <form action="/peminjaman" method="POST" class="container mt-4">
        <div class="mb-3">
            <label for="book_id" class="form-label">Pilih Buku</label>
            <select name="book_id" id="book_id" class="form-select" aria-label="Pilih Buku">
                <option value="">Pilih Buku</option>
                <?php foreach ($data as $book) : ?>
                    <option value="<?= $book->getId() ?>"><?= $book->getTitle() ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="user_id" class="form-label">Pilih Member</label>
            <select name="user_id" id="user_id" class="form-select" aria-label="Pilih Member">
                <option value="">Pilih Member</option>
                <?php foreach ($data2 as $member) : ?>
                    <option value="<?= $member->getId() ?>"><?= $member->getName() ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="borrow_date" class="form-label">Tanggal Peminjaman</label>
            <input type="date" name="borrow_date" id="borrow_date" class="form-control" value="<?= date('Y-m-d') ?>">
        </div>

        <div class="mb-3">
            <label for="return_date" class="form-label">Tanggal Pengembalian</label>
            <input type="date" name="return_date" id="return_date" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Pinjam</button>
    </form>
    <div class="container my-4">

        <?php if (isset($_SESSION['error'])) : ?>
            <div class="alert alert-danger text-center">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        <?php endif ?>
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success text-center">
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </div>
        <?php endif ?>
    </div>
    <H5 class="mt-4 container">BUKU YANG SEDANG DIPINJAM</H1>

        <div class="table table-responsiven my-6 container">
            <table class="table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>TITLE</th>
                        <th>AUTHOR</th>
                        <th>BORROW AT</th>
                        <th>RETURN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data3 as $list) : ?>
                        <tr>
                            <td><?= $number++ ?></td>
                            <td><?= $list->getTitle() ?></td>
                            <td><?= $list->getAuthor() ?></td>
                            <td><?= $list->getBorrow() ?></td>
                            <td><?= $list->getReturn() ?></td>

                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            <div class="my-4">
                <a href="/">Back to Home</a>
            </div>
        </div>

        <div class="footer">
            <p>Copyright© <script>
                    document.write(new Date().getFullYear())
                </script> All Rights Reserved By <span class="text-primary">EARTH LIBRARY</span></p>
        </div>
        </section>

</div>


<?php include('templates/footer.php') ?>