/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
// 删除记录
function deleteInfo(url){
    if(confirm('确认删除？')){
        window.location = url;
    }
}

function cancelInfo(url){
    if(confirm('确认取消？')){
        window.location = url;
    }
}

function setInfo(url){
    if(confirm('确认设置？设置后不可修改')){
        window.location = url;
    }
}