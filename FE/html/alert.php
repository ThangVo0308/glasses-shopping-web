<?php
$data = json_decode($_GET['data'], true);
?>
<div id="alertForm">
    <img id="btnClose" src="../../icons/close.png" alt="">
    <div>
        <img id="icon-alert" src="../../icons/eyeglasses.png" alt="">
        <span id="title-alert" class="section">Opps!</span>
    </div>
    <span class="section" ><?php echo $data['value'] ?></span>
</div>
<link rel="stylesheet" href="../css/alert.css">
<script src="../controller/alert.js"></script>

<script>
    <?php
    if (isset($data['status'])) {
        $status = json_encode($data['status']);
        $reload = json_encode($data['reload']);
        $link = json_encode($data['link']);
    } else {
        $status = json_encode('');
        $reload = json_encode('');
        $link = json_encode('');
    }
    ?>

    var status = <?php echo $status ?>;
    var alertForm = document.getElementById('alertForm');
    var sections = document.querySelectorAll('.section');
    var icon = document.getElementById('icon-alert');
    var titleAlert = document.getElementById('title-alert');
    var alertIframe = parent.document.getElementById('alert');

    switch (status) {
        case 'error':
            alertForm.style.backgroundColor = '#ffcccc';
            alertForm.style.border = '1px solid #ff0000';
            sections.forEach(function(section) {
                section.style.color = 'rgb(193, 42, 42)';
            });
            icon.src = '../../icons/error_alert.png';
            titleAlert.textContent = 'Oops!'
            break;

        case 'warning':
            alertForm.style.backgroundColor = '#E6F7FF';
            alertForm.style.border = '1px solid #004D99';
            sections.forEach(function(section) {
                section.style.color = 'rgb(15, 83, 138)';
            });
            icon.src = '../../icons/warning_alert.png';
            titleAlert.textContent = 'Warning!'
            break;

        case 'success':
            alertForm.style.backgroundColor = '#DFF0D8';
            alertForm.style.border = '1px solid #4F8A10';
            sections.forEach(function(section) {
                section.style.color = 'rgb(40, 140, 42)';
            });
            icon.src = '../../icons/tick_alert.png';
            titleAlert.textContent = 'Nice!'
            break;
    }
    var reloadTime = <?php echo $reload ?>;
    var link = <?php echo $link ?>;


    if(reloadTime > 0){
        setTimeout(() => {
            alertIframe.style.display='none';
            if(link != ''){
                var homeScreen = parent.document.getElementById('homeScreen');
                homeScreen.src = link;
            }
            else {
                parent.document.location.reload();
            }
        }, reloadTime);
    }
</script>