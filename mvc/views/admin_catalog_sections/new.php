<!---->
<!--<body>-->
<!--<!-- Display status message -->-->
<?php //if(!empty($statusMsg)){ ?>
<!--    <div class="col-xs-12">-->
<!--        <div class="alert --><?php //echo $statusType; ?><!--">--><?php //echo $statusMsg; ?><!--</div>-->
<!--    </div>-->
<?php //} ?>
<!---->
<!--<div class="row">-->
<!--    <!-- Import & Export link -->-->
<!--    <div class="col-md-12 head">-->
<!--        <div class="float-right">-->
<!--            <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i class="plus"></i> Import</a>-->
<!--            <a href="exportcsvfile.php" class="btn btn-primary"><i class="exp"></i> Export</a>-->
<!--        </div>-->
<!--    </div>-->
<!--    <!-- CSV file upload form -->-->
<!--    <div class="col-md-12" id="importFrm" style="display: none;">-->
<!--        <form action="importcsvfile.php" method="post" enctype="multipart/form-data">-->
<!--            <input type="file" name="file" />-->
<!--            <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">-->
<!--        </form>-->
<!--    </div>-->
<!---->
<!--    <!-- Data list table -->-->
<!--    <table class="table table-striped table-bordered">-->
<!--        <thead class="thead-dark">-->
<!--        <tr>-->
<!--            <th>#ID</th>-->
<!--            <th>Name</th>-->
<!--            <th>Email</th>-->
<!--            <th>Phone</th>-->
<!--            <th>Status</th>-->
<!--        </tr>-->
<!--        </thead>-->
<!--        <tbody>-->
<!--        --><?php
//        // Get member rows
//        $result = $db->query("SELECT * FROM users ORDER BY id DESC");
//        if($result->num_rows > 0){
//            while($row = $result->fetch_assoc()){
//                ?>
<!--                <tr>-->
<!--                    <td>--><?php //echo $row['id']; ?><!--</td>-->
<!--                    <td>--><?php //echo $row['name']; ?><!--</td>-->
<!--                    <td>--><?php //echo $row['email']; ?><!--</td>-->
<!--                    <td>--><?php //echo $row['phone']; ?><!--</td>-->
<!--                    <td>--><?php //echo $row['status']; ?><!--</td>-->
<!--                </tr>-->
<!--            --><?php //} }else{ ?>
<!--            <tr><td colspan="5">No Record found...</td></tr>-->
<!--        --><?php //} ?>
<!--        </tbody>-->
<!--    </table>-->
<!--</div>-->
<!---->
<!--<!-- Show/hide CSV upload form -->-->
<!--<script>-->
<!--    function formToggle(ID){-->
<!--        var element = document.getElementById(ID);-->
<!--        if(element.style.display === "none"){-->
<!--            element.style.display = "block";-->
<!--        }else{-->
<!--            element.style.display = "none";-->
<!--        }-->
<!--    }-->
<!--</script>-->
<!--</body>-->
<!--</html>-->
