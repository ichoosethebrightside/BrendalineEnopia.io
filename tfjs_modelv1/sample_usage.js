// Sample code to load your model in JavaScript

// Load the model
async function loadModel() {
    const model = await tf.loadLayersModel('./web_model/model.json');
    console.log('Model loaded!');
    return model;
}

// Load class names
async function loadClassNames() {
    const response = await fetch('./web_model/class_names.json');
    const classNames = await response.json();
    return classNames;
}

// Predict function
async function predict(model, classNames, imageElement) {
    // Preprocess image
    let img = tf.browser.fromPixels(imageElement);
    img = tf.image.resizeBilinear(img, [224, 224]);
    img = img.div(255.0).expandDims(0);
    
    // Predict
    const predictions = model.predict(img);
    const predArray = await predictions.data();
    
    // Get top prediction
    const maxIndex = predArray.indexOf(Math.max(...predArray));
    const confidence = predArray[maxIndex];
    
    console.log(`Predicted: ${classNames[maxIndex]} (${(confidence * 100).toFixed(2)}%)`);
    
    // Cleanup
    img.dispose();
    predictions.dispose();
    
    return {
        class: classNames[maxIndex],
        confidence: confidence,
        allPredictions: Array.from(predArray)
    };
}

// Usage example
async function main() {
    const model = await loadModel();
    const classNames = await loadClassNames();
    
    // Get image element from your HTML
    const imgElement = document.getElementById('myImage');
    
    // Make prediction
    const result = await predict(model, classNames, imgElement);
    console.log('Result:', result);
}
