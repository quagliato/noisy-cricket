<?php
    $user = Structure::verifySession();
	Structure::header();
?>
                <h1>Arquivos > Listar arquivos</h1>
                <?php
                    $dao = new GenericDAO;
                    $result = $dao->selectAll('File', 'id_user = '.$_SESSION['user_id']);

                    
                    if($result):
                        if (!is_array($result)) {
                            $result = array($result);
                        }
                ?>
                <ul>
                <?php
                    foreach($result as $file) {
                        $link = FILES_URL.$file->get('id')."-".$file->get('filename');
                ?>
                    <li><a target="_blank" href="<?=$link?>"><?=$link?></a></li>
                <?php } ?>

                </ul>
                <?php else: ?>
                Nenhum arquivo encontrado
                <?php endif; ?>

<?php Structure::footer(); ?>
