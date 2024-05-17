window.onload = function () {
    var username = localStorage.getItem('username');

    if (username) {
        fetchProducts(username);
        fetchInquiries(username); // Call fetchInquiries to load inquiries
    } else {
        console.error("Username not found in localStorage");
    }
};

function fetchProducts(username) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "admin.php?username=" + encodeURIComponent(username), true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var products = JSON.parse(xhr.responseText);
            displayProducts(products, username);
        }
    };
    xhr.send();
}

function fetchInquiries(username) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "admininquiry.php?username=" + encodeURIComponent(username), true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var inquiries = JSON.parse(xhr.responseText);
            displayInquiries(inquiries, username); // Call displayInquiries with fetched inquiries
        }
    };
    xhr.send();
}

function displayProducts(products, username) {
    const productList = document.getElementById("productList");
    productList.innerHTML = '';

    if (products.length === 0) {
        productList.innerHTML = '<h2 class="no-products">No products available</h2>';
        return;
    }

    products.forEach(function (product) {
        productList.innerHTML += `
            <div class="product">
                <img src="${product.image}" alt="${product.name}">
                <h3>${product.name}</h3>
                <p>Rs. ${product.price}</p>
                <button onclick="updateProductStatus(${product.id}, '${product.name}', ${product.price}, '${product.image}', '${username}', 'approve')">Approve</button>
                <button onclick="updateProductStatus(${product.id}, '${product.name}', ${product.price}, '${product.image}', '${username}', 'disapprove')">Disapprove</button>
            </div> 
        `;
    });
}

function displayInquiries(inquiries, username) {
    const inquiryTable = document.getElementById("inquiryTable").getElementsByTagName('tbody')[0];
    inquiryTable.innerHTML = '';

    if (inquiries.length === 0) {
        const noInquiriesRow = inquiryTable.insertRow();
        const cell = noInquiriesRow.insertCell();
        cell.colSpan = "6"; // Adjusted colspan for the additional delete button cell
        cell.textContent = "No inquiries available";
        return;
    }

    inquiries.forEach(function (inquiry, index) {
        const row = inquiryTable.insertRow();
        row.insertCell().textContent = index+1;
        row.insertCell().textContent = inquiry.name;
        row.insertCell().textContent = inquiry.email;
        row.insertCell().textContent = inquiry.subject;
        row.insertCell().textContent = inquiry.message;
        
        // Add a delete button cell with red text
        const deleteCell = row.insertCell();
        const deleteButton = document.createElement('button');
        deleteButton.textContent = 'Delete';
        deleteButton.style.color = 'red';
        deleteButton.onclick = function() {
            deleteInquiry(inquiry.id, username);
        };
        deleteCell.appendChild(deleteButton);
    });
}

function deleteInquiry(inquiryId, username) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "admininquiryd.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Reload inquiries after deletion
            fetchInquiries(username);
        }
    };
    xhr.send("id=" + inquiryId);
}



