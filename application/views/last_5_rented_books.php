<?php include('header.php'); ?>

		<h3>Last 5 rented books</h3>
        <p>
            <table border="1">
                <tr>
                    <th>S. No.</th>
                    <th>Book</th>
                    <th>Customer</th>
                    <th>Date</th>
                </tr>
                <?php $i = 1; ?>
                <?php foreach($books as $book) { ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $book->title; ?></td>
                        <td><?php echo $book->name; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($book->created_at)); ?></td>
                    </tr>
                <?php $i++; ?>
                <?php } ?>
            </table>
        </p>

<?php include('footer.php'); ?>
