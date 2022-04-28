var qtdeCampos = 0;

    function addCampos() {
        var objPai = document.getElementById("campoPai");
        //Criando o elemento DIV;
        var objFilho = document.createElement("tr");
        //Definindo atributos ao objFilho:
        objFilho.setAttribute("id","filho"+qtdeCampos);

        //Inserindo o elemento no pai:
        objPai.appendChild(objFilho);
        //Escrevendo algo no filho recém-criado:
        
        //Navegador
        if(navigator.vendor=="Google Inc."){
            var imprime = "<td><input type='text' id='item"+qtdeCampos+"' name='item"+qtdeCampos+"' style='width: 441px;' required></td>";
            imprime += "<td><input type='text' id='conta"+qtdeCampos+"' name='conta"+qtdeCampos+"' style='width: 120px;' required></td>";
            imprime += "<td><input type='text' id='custo"+qtdeCampos+"' name='custo"+qtdeCampos+"' style='width: 120px;' required></td>";
            imprime += "<td><input type='text'id='departamento"+qtdeCampos+"' name='departamento"+qtdeCampos+"' style='width: 110px;' required></td>";
            imprime += "<td><input type='text' id='valor"+qtdeCampos+"' name='valor"+qtdeCampos+"' style='width: 110px;' required></td>";
            imprime+= "<td><input type='button' name='removerBtn' class='nao_imprimir' id='removerBtn' title='Clique para remover o ítem da linha.' onclick='removerCampo("+qtdeCampos+")' value='-' style='width: 25px;'></td>";
            
        }else{
            var imprime = "<td><input type='text' id='item"+qtdeCampos+"' name='item"+qtdeCampos+"' style='width: 440px;' required></td>";
            imprime += "<td><input type='text' id='conta"+qtdeCampos+"' name='conta"+qtdeCampos+"' style='width: 118px;' required></td>";
            imprime += "<td><input type='text' id='custo"+qtdeCampos+"' name='custo"+qtdeCampos+"' style='width: 118px;' required></td>";
            imprime += "<td><input type='text' id='departamento"+qtdeCampos+"' name='departamento"+qtdeCampos+"' style='width: 108px;' required></td>";
            imprime += "<td><input type='text' id='valor"+qtdeCampos+"' name='valor"+qtdeCampos+"' style='width: 108px;' required></td>";
            imprime+= "<td><input type='button' name='removerBtn' id='removerBtn' class='nao_imprimir' title='Clique para remover o ítem da linha.' onclick='removerCampo("+qtdeCampos+")' value='-' style='width: 25px;'></td>";
            
        }
        cadastrar.addBtn.style.border="1px solid #009933";
        document.getElementById("filho"+qtdeCampos).innerHTML = imprime;
        document.getElementById("qntCampos").value = qtdeCampos;
        qtdeCampos++;
    }

    function removerCampo(id) {
        var objPai = document.getElementById("campoPai");
        var objFilho = document.getElementById("filho"+id);

        //Removendo o DIV com id específico do nó-pai:
        var removido = objPai.removeChild(objFilho);
    }
    
    if(navigator.appName=="Microsoft Internet Explorer"){
        alert("Navegador não suportado.\nUtilize o Google Chrome ou o Mozilla Firefox.");
        window.location.assign("http://www.google.com/chrome");
    }
    
    function validar(){
        
        var item = cadastrar.item0;
        
        if(item==undefined){
            alert("Adicione pelo menos um item à solicitação.");
            cadastrar.addBtn.style.border="1px solid red";
            
            return false;
        }else{
            window.print();
            return true;
        }
    }
    
    function somente_numero(campo){
        var digits="0123456789()-/";
        var campo_temp;
            for (var i=0;i<campo.value.length;i++){
                    campo_temp=campo.value.substring(i,i+1);
                    if (digits.indexOf(campo_temp)==-1){
                            campo.value = campo.value.substring(0,i);
                    }
            }
    }
    