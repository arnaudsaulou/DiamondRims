
/* Product -  Search bar */

let brandSelect = document.getElementById("brandSelect");
let modelSelect = document.getElementById("modelSelect");
let modelGroup= document.getElementById("modelGroup");
let milageSelect = document.getElementById("milageSelect");

function brandSelectListener(){
  let brandId = brandSelect.value;

  if(brandId == 0){
    modelSelect.classList.add("d-none");
    milageSelect.classList.add("d-none");
  } else {
    getModelsWithBrandId(brandId);
    modelSelect.classList.remove("d-none");
  }
}

function modelSelectListener(){
  if(modelSelect.value == 0){
    milageSelect.classList.add("d-none");
  } else {
    milageSelect.classList.remove("d-none");
  }
}

function getModelsWithBrandId(brandId){
  $.ajax({
    type: "POST",
    url: './assets/ajax/getModelsWithBrandId.ajax.php',
    dataType: "json",
    data: { brandId: brandId },
    success: function (models) {
      constructSelectModel(models)
    }
  });
}

function displayMilageDependingOnArrayLenght(modelArray){
  if(modelArray.length == 1){
    milageSelect.classList.remove("d-none");
  } else {
    milageSelect.classList.add("d-none");
  }
}

function constructSelectModel(modelArray){

  displayMilageDependingOnArrayLenght(modelArray);
  removeOptions(modelSelect);

  modelArray.forEach(function(item){
    const option = document.createElement("option");
    option.value = item.id;
    option.text = item.name;
    modelGroup.appendChild(option);
  });

}

function removeOptions(selectElement) {
   var i, L = selectElement.options.length - 1;
   for(i = L; i >= 1; i--) {
      selectElement.remove(i);
   }
}
