<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
</head>
<style>
 .main-content {
  padding:20px;
    margin-left: 230px;
}

.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
}

.input-box {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.details {
    font-size: 18px;
    font-weight: bold;
}
   /* Add a box shadow to input boxes */
 .input-box {
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        padding: 6px;
        border-radius: 5px;
    }

table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

table th, table td {
    padding: 15px;
    text-align: left;
    border: 1px solid #ddd;
}

.h1{
  padding: 10px;
}

table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tbody tr:hover {
    background-color: #ecf0f1;
}

</style>
<body>
    <?php
    
        session_start();
        
        if(!isset($_SESSION['user'])||$_SESSION['user']!= true ){
           header("location:user_login.php"); 
           exit();
           
        }
        include("dbconnect.php");
        include('nav.php');
        $user= $_SESSION['username1'];
        $name=$_SESSION['name'];
    ?>
     <header>
         </header>
         <div class ="main-content">
             <div class = "container">
                 <h1>Transaction History</h1>
    <main>
    <section>
            <!-- <h2></h2> -->
         
   
                <h1> </h1>
               
                <table class="table table-primary">
                <thead>
                        <th scope = "col">SL.no</th>
                        <th scope = "col">Rference ID</th>
                        <th scope = "col">Amount</th>
                        <th scope = "col">Transaction ID</th>
                        <th scope = "col">Transaction Date</th>
                        <th scope = "col">Reason</th>
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
                        
                        <tr>
                        <td>".$count."</td>
                        <td>".$row['refence_id']."</td>
                        <td>".$row['ammount']."</td>
                        <td>".$row['Transaction_Id']."</td>
                        <td>".$row['time']."</td>
                        <td>".$row['Reason']."</td>
                       
                        
                         
                       
                       

                    </tr> ");
                    $count++;
                    
                  }
                }
            
                else{
                    echo "no Transaction details are available as of now";
                }?>
                    <!-- Display registered vehicles' IDs here -->
                </tbody>
            </table>

        </section>
        </div>
        </div>
</body>
</html>