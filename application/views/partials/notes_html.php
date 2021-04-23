<script>
    // $(".note").click(function(){
    //     var textarea_cont = $(this).html();
    //     $(this).attr('name', 'description');
    //     $(this).replaceWith(($(document.createElement('textarea'))).html(textarea_cont));
    // });
    $(document).ready(function(){
        $('.delete').submit(function(){
            $.post($(this).attr('action'), $(this).serialize(), function(notes){
                $('.note-cont').html(notes);
            });
            return false;
        });
        $('.edit').keyup(function(e){
            if(e.keyCode == 13 && !e.shiftKey){
                $.post($(this).attr('action'), $(this).serialize(), function(notes){
                    $('.note-cont').html(notes);
                });
            }
            return false;
        });
        $('.title').submit(function(e){
            $.post($(this).attr('action'), $(this).serialize(), function(notes){
                $('.note-cont').html(notes);
            });
            return false;
        });
    });
</script>
<?php
    foreach($notes as $note){ ?>
        <h4 class="note-title"><?= $note['title'] ?>
            <form action="/notes/delete" method="post" class="pull-right delete">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <input type="submit" value="Delete" class="btn-delete">
            </form>
        </h4>
        <form action="/notes/edit" method="post" class="edit title">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <input type="text" name="title" value="<?= $note['title'] ?>">
            <!-- <div class="note" name="description"><?= $note['description'] ?></div> -->
            <textarea class="note" name="description"><?= $note['description'] ?></textarea>
        </form>
<?php
    } ?>