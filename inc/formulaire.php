



<form action="<?php the_permalink()?>" method="post">
    <?php echo $msg?>
    <div class="form-name form-group">
        <label for="name">Prénom</label>
        <input name="contact-name" class="form-control" type="text" placeholder="Insérer votre prénom" required>
    </div>
    <div class="form-mail form-group">
        <label for="mail">Adresse Mail</label>
        <input name="contact-mail" class="form-control" type="email" placeholder="ex:johndoe@mail.com" required>
    </div>
    <div class="form-msg form-group">
        <label for="message">Message</label>
        <textarea class="form-control" name="contact-message" id="" cols="30" rows="10" placeholder="Insérez votre message" required></textarea>
    </div>
    <input type="hidden" name="submitted" value="1">
    <button type="submit" class="btn-sub btn btn-primary">Envoyer</button>
</form>




