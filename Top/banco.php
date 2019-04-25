    <?php

    class MyBanco{

        function __construct(){}

        public function Conectar()
        {
            try{
                $serverName = "(local)\SQLEXPRESS";
                $connectionInfo = array("Database" => "bd_top");
                //$connectionInfo = array("UID" => "lguilen@bdtop", "pwd" => "Senha2017#", "Database" => "bd_top", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
                //$serverName = "bdtop.database.windows.net,1433";
                $conn = sqlsrv_connect($serverName, $connectionInfo);
                $sql = "USE bd_top";
                $stmt = sqlsrv_query($conn,$sql);
                return $conn;
            }
            catch(sqlsrv_sql_exception $ex)
            {
                print_r( sqlsrv_errors(), true);
                sqlsrv_close($conn);
            }
        }

        public function RetornarID($username)
        {
            $bd = new MyBanco();
            $strcn = $bd->Conectar();
            $valorID = 0;

            //Retornando o ID do cliente $username
            $select = "SELECT user_in_id FROM tb_usuario WHERE user_st_username = '$username'";

            if($ex = sqlsrv_query($strcn,$select)){

                while($linha = sqlsrv_fetch_array($ex,SQLSRV_FETCH_ASSOC))
                {
                    $id = $linha["user_in_id"];
                    $valorID = $id;
                }
            } else {
                
                echo "ID não encontrado <br>".sqlsrv_error($strcn);
            }
            return $valorID;
        }

        public function ValidarLogin($user,$senha)
        {
            $cn = new MyBanco();
            $strcn = $cn->Conectar();
            
            $sql = "SELECT dbo.func_validaLogin (?,?) as status;";

            $stmt = sqlsrv_prepare($strcn,$sql,array(&$user,&$senha));

            if(!$stmt){
                die(print_r(sqlsrv_errors(),true));
            }
            
            if(sqlsrv_execute($stmt))
            {
                while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
                    $status = $row['status'];
                }
                if (strcmp($status, 'Valido')==0) 
                    return 1;
                else
                    return 0;
            } else {
                die(print_r(sqlsrv_errors(), true));
            }
    		
        }
        
        protected function CadastrarEmail($username,$email)
        {
            $bd = new MyBanco();
            $strcn = $bd->Conectar();
            $id = $bd->RetornarID($username);
            
            //Inserindo o novo email pelo id do usuario
            $sql = "SELECT email_st_desc FROM dbo.tb_email WHERE userEmail_in_id = $id";

            $ex = sqlsrv_query($strcn,$sql,array(),array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
            if(sqlsrv_num_rows($ex)>0)
            {
                while($row = sqlsrv_fetch_array($ex,SQLSRV_FETCH_ASSOC))
                {
                    //Verificando se o email ja existe
                    if(strcmp($row["email_st_desc"],$email)==0)
                    {
                        $v = 0;
                        break;
                    } else {
                        $v = 1;
                    }
                }
            } else {
                $v = 1;
            }
            if($v!=0){
                $insert = "INSERT INTO tb_email (userEmail_in_id,email_st_desc)  VALUES($id,'$email')";
                sqlsrv_query($strcn,$insert);
                return 1;
            } else {
                return 0;
            }
        }
            
        protected function CadastrarContato($username,$telefone,$celular)
        {
            $bd = new MyBanco();
            $strcn = $bd->Conectar();
            $id = $bd->RetornarID($username);
            $retorno = null;

            $sql = "SELECT tipoCont_in_id,cont_st_desc FROM tb_contato WHERE userCont_in_id = $id";
            $ex = sqlsrv_query($strcn,$sql,array(),array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
            $numRows = sqlsrv_num_rows($ex);
            if($numRows>0)
            {
                while($row = sqlsrv_fetch_array($ex,SQLSRV_FETCH_ASSOC))
                {
                    //Verificando se o telefone ou celular ja esta cadastrado
                    switch ($row["tipoCont_in_id"]) {
                        case 1:
                        {
                            if(strcmp($telefone, $row["cont_st_desc"])==0)
                                $vTel = 0;
                            else
                                $vTel = 1;    
                        }
                        case 2:
                        {
                            if(strcmp($celular, $row["cont_st_desc"])==0)
                                $vCel = 0;
                            else
                                $vCel = 1;
                            break;
                        }
                        default:
                            break;
                    }
                }
            } else {
                $vTel = 1;
                $vCel = 1;
            }

            switch ($vTel) {
                case 0:
                {
                    $retorno = 0;
                    break;
                }
                case 1:
                {
                    $insert = "INSERT INTO tb_contato 
                                (userCont_in_id
                                ,tipoCont_in_id
                                ,cont_st_desc) 
                            VALUES ($id,1,'$telefone')";
                    sqlsrv_query($strcn,$insert);
                    $retorno = 1;
                    break;
                }
                default:
                    break;
            }

            switch ($vCel) {
                case 0:
                    $retorno = 0;
                    break;
                case 1:
                {
                    $insert = "INSERT INTO tb_contato 
                                (userCont_in_id
                                ,tipoCont_in_id
                                ,cont_st_desc) 
                            VALUES ($id,2,'$celular')";
                    sqlsrv_query($strcn,$insert);
                    $retorno = 1;
                    break;
                }
                default:
                    break;
            }

            return $retorno;
        }


        public function Cadastrar($nome,$email,$sexo,$dtnasc,$username,$senha,$uf,$cidade,$nivel,$status,$telefone,$celular)
        {
            $bd = new MyBanco();

            $cnx = $bd->Conectar();

            date_default_timezone_set('America/Sao_Paulo');    
            $dtcad = date('Y-m-d h:i:s',time());
            
            //$dt = explode("-", $dtnasc);
            //list($ano,$mes,$dia) = $dt;
            //$dtN = $dia.",".$mes.",".$ano;
            
            /*echo "Nome - ".$nome."<br>";
            echo "Sexo - ".$sexo."<br>";
            echo "Data Nascimento - ".$dtnasc."<br>";
            echo "Username - ".$username."<br>";
            echo "Senha - ".$senha."<br>";
            echo "UF - ".$uf."<br>";
            echo "Cidade - ".$cidade."<br>";
            echo "Data Cadastro - ".$dtcad."<br>";
            echo "Nivel Academico - ".$nivel."<br>";
            echo "Status teste - ".$status."<br>";*/

            $sql = "INSERT INTO [dbo].[tb_usuario]
                        ([user_st_nome]
                        ,[user_st_sexo]
                        ,[user_dt_dtNasc]
                        ,[user_st_username]
                        ,[user_st_senha]
                        ,[user_st_uf]
                        ,[user_st_cidade]
                        ,[user_in_nivelAcad]
                        ,[user_dt_dtCad]
                        ,[user_bool_fezTeste]
                        ,[user_img_avatar]
                        ,[user_st_bio])
                    VALUES
                        ('$nome'
                        ,'$sexo'
                        ,'$dtnasc'
                        ,'$username'
                        ,HASHBYTES('sha1','$senha')
                        ,'$uf'
                        ,'$cidade'
                        ,$nivel
                        ,'$dtcad'
                        ,$status
                        ,null,null)";

                $stmt = sqlsrv_query($cnx,$sql);

               if(!$stmt) {
                    return 0;
               } else {
                    $bd->CadastrarContato($username,$telefone,$celular);
                    $bd->CadastrarEmail($username,$email);
                    return 1;
               }
                sqlsrv_close($cnx);
            }
        }
    ?>