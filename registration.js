function showSection(sectionId) {
    // Hide all sections
    var sections = document.getElementsByClassName('section');
    for (var i = 0; i < sections.length; i++) {
        sections[i].style.display = 'none';
    }
    
    // Show the selected section
    var section = document.getElementById(sectionId);
    if (section) {
        section.style.display = 'block';
    }
}

function seterror(id,error) {
    //sets error inside the tag of the id
    Element = document.getElementById(id)
    Element.getElementsByClassName('formerror')[0].innerHTML = error;

}

function validateform() {
    var returnval = true;

    // Perform validation and if validation fails set the value of the returnval to false 
    var phone = document.forms['myform']['phone'].value;
    var phoneError = document.getElementById("phone-error");

    if (phone.length < 10) {
        phoneError.innerHTML = "Length of the phone number is not valid (should be at least 10 characters)";
        returnval = false;
    } else {
        phoneError.innerHTML = ""; // Clear any previous error message
    }

    return returnval;
}

function toggleDisabilityType() {
    var disabilityDropdown = document.getElementById("disability_dropdown");
    var disabilityTypeLabel = document.getElementById("disability_type_label");
    var disabilityTypeDropdown = document.getElementById("disability_type_dropdown");

    if (disabilityDropdown.value === "yes") {
        disabilityTypeLabel.style.display = "block";
        disabilityTypeDropdown.style.display = "block";
    } else {
        disabilityTypeLabel.style.display = "none";
        disabilityTypeDropdown.style.display = "none";
    }
}

function toggleMinorityType() {
    var minorityDropdown = document.getElementById("minority_entry");
    var minorityTypeLabel = document.getElementById("minority_type_label");
    var minorityTypeDropdown = document.getElementById("minority_type_entry");

    if (minorityDropdown.value === "Yes") {
        minorityTypeLabel.style.display = "block";
        minorityTypeDropdown.style.display = "block";
    } else {
        minorityTypeLabel.style.display = "none";
        minorityTypeDropdown.style.display = "none";
    }
}

function goBack() {
    window.history.back();
}

function previewImage(input) {
    var container = input.parentNode; // Get the parent container of the input element
    var preview = container.querySelector('.upload-preview');
    var file = input.files[0];
    var reader = new FileReader();
    
    // Check if there is an existing image preview
    var existingImage = container.querySelector('.session-image-preview');

    if (existingImage) {
        // If an existing image preview exists, hide it
        existingImage.style.display = 'none';
    }

    reader.onloadend = function () {
        preview.style.backgroundImage = "url(" + reader.result + ")";
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.style.backgroundImage = null;
    }
}

// Function to copy name to search name field in real-time
function copyNameToSearchName() {
    var nameEntry = document.getElementById("name_entry").value;
    var searchNameEntry = document.getElementById("search_name_entry");
    searchNameEntry.value = nameEntry;
}

// Listen for input event on the name entry field and call copyNameToSearchName
document.getElementById("name_entry").addEventListener("input", copyNameToSearchName);
