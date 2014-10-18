window.onload = function () {
    // Grab a reference to your overlay element:
    var overlay = document.getElementById('myOverlay');
    // Check if the overlay really exists
    // and if it is really appended to the DOM,
    // because if not - removeChild throws an error
    if (overlay && overlay.parentNode && overlay.parentNode.nodeType === 1) {
        // Remove overlay from DOM:
        overlay.parentNode.removeChild(overlay);
        // Now trash it to free some resources:
        overlay = null;
    }
    
    
    // ... Something else to do here perhaps?
    
    
};