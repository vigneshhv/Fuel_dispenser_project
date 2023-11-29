<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
</head>
<style>
    body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #2c3e50;
            color: #ecf0f1;
        }

        header {
            background-color: #3498db;
            color: #fff;
            text-align: center;
            padding: 1em;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ecf0f1;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        section {
            margin-bottom: 20px;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            color:black;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

</style>
<body>
    <?php
    
        session_start();
        
        if(!isset($_SESSION['user'])||$_SESSION['user']!= true ){
           header("location:user_login.php"); 
           exit();
           
        }
        include("db.php");
        $user= $_SESSION['username1'];
        $name=$_SESSION['name'];
    ?>
     <header>
        <h1>Transaction History</h1>
    </header>
    <div class="input-box">
                    <span class="details">Full Name <?php
                    echo ": $name";?></span>
                    </div>

                    <div class="input-box">
                    <span class="details">Registration Number <?php
                    echo ": $user";?></span>
                    </div>
    <main>
    <section>
            <!-- <h2></h2> -->
            <table>
                <thead>
                    <tr>
                        <th>SL.no</th>
                        <th>Rference ID</th>
                        <th>Amount</th>
                        <th>Transaction ID</th>
                        <th>Transaction Date</th>
                        <th>Reason</th>
                    </tr>
                </thead>
                <tbody>
                <?php
         
            $sql_tranc = "SELECT
            transactions.refence_id,
            transactions.Transaction_Id,
            transactions.ammount,
            transactions.time,
            challan.Reason
        FROM
            transactions
        LEFT JOIN challan ON transactions.refence_id = challan.Challan_Id
        WHERE
            transactions.refence_id = '$user' OR challan.Reg_no = '$user'";
                $result_reg=mysqli_query($conn,$sql_tranc);
                $count=1;
              
                if(mysqli_num_rows($result_reg)>0){
                while($row=mysqli_fetch_assoc($result_reg)){
                    if($row['Reason']==NULL){
                        $row['Reason']="Ammount is added to account";
                    }
                        echo("
                        <table>
                        <tr>
                        <td>".$count."</td>
                        <td>".$row['refence_id']."</td>
                        <td>".$row['ammount']."</td>
                        <td>".$row['Transaction_Id']."</td>
                        <td>".$row['time']."</td>
                        <td>".$row['Reason']."</td>
                       
                        </td>
                         
                       
                       

                    </tr>   </table>");
                    $count++;
                    
                  }
                }
            
                else{
                    echo "no vehicles are listed";
                }?>
                    <!-- Display registered vehicles' IDs here -->
                </tbody>
            </table>
        </section>
</body>
</html>