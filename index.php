<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <form>
        <select onChange="displayState()" id="country">
            <option >Select Here---</option>
            <?php
            include "connection.php";

            $displayCountry = "SELECT * FROM  country";
            $display = mysqli_query($connection,$displayCountry);
            

            while($result=mysqli_fetch_assoc($display)){
                echo '<option value='.$result['ID'].'>'.$result['COUNTRY'].'</option>';
            }
            ?>
        </select>
        <select id="state" onChange="displayCity()">
            <option>Select Here---</option>
            
        </select>
        <select id="city">
            <option>Select Here---</option>
        </select>
    </form>

    <script>

        const displayCity =()=>{
            var cId=$('#state').val();
            $.ajax({
                url:'state.php',
                type :'POST',
                data :{cId :cId},
                success:function(data){
                    $('#city').html(data);
                }
            })
        }


        const displayState =()=>{
            var id=$('#country').val();
            $.ajax({
                url :'state.php',
                type :'POST',
                data : {id:id},
                success :function(data){
                   $('#state').html(data);
                    displayCity();
                }
            })  
        }
        
    </script>
</body>
</html>
