<?php include('header.php'); ?>

		<h3>List of all books</h3>
        <hr>
        <p>
            <?php
                if($books->links->prev !== NULL)
                {
                    $prev_page = $books->meta->current_page - 1;
            ?>
                <a href="<?php echo base_url('dashboard/link-3').'?page='.$prev_page; ?>">Prev</a>
            <?php } else { ?>
                Prev
            <?php } ?> |
            <?php
                if($books->links->next !== NULL)
                {
                    $next_page = $books->meta->current_page + 1;
            ?>
                <a href="<?php echo base_url('dashboard/link-3').'?page='.$next_page; ?>">Next</a>
            <?php } else { $next_page = $books->meta->current_page+1;?>
                Next
            <?php } ?>
        </p>
        <hr>
        <p>
            <table border="1">
                <tr>
                    <th>Book Id</th>
                    <th>Book</th>
                    <th>ISBN</th>
                    <th>Total Quantity</th>
                    <th>Available Quantity</th>
                </tr>
                <?php $i = 1; ?>
                <?php foreach($books->data as $book) { ?>
                    <tr>
                        <td><?php echo $book->id; ?></td>
                        <td><?php echo $book->title; ?></td>
                        <td><?php echo $book->isbn; ?></td>
                        <td><?php echo $book->total_quantity; ?></td>
                        <td><?php echo $book->available_quantity; ?></td>
                    </tr>
                <?php $i++; ?>
                <?php } ?>
            </table>
        </p>
        <hr>
        <p>
            <?php
                if($books->links->prev !== NULL)
                {
                    $prev_page = $books->meta->current_page - 1;
            ?>
                <a href="<?php echo base_url('dashboard/link-3').'?page='.$prev_page; ?>">Prev</a>
            <?php } else { ?>
                Prev
            <?php } ?> |
            <?php
                if($books->links->next !== NULL)
                {
                    $next_page = $books->meta->current_page + 1;
            ?>
                <a href="<?php echo base_url('dashboard/link-3').'?page='.$next_page; ?>">Next</a>
            <?php } else { $next_page = $books->meta->current_page+1;?>
                Next
            <?php } ?>
        </p>

<?php include('footer.php'); ?>
