from tensorflow.keras.applications import mobilenet_v2
from tensorflow.keras.preprocessing import image
import numpy as np
import sys

# Load Pre-trained Model
model = mobilenet_v2.MobileNetV2(weights='imagenet')

def validate_image(img_path):
    try:
        # Load and preprocess the image
        img = image.load_img(img_path, target_size=(224, 224))
        img_array = image.img_to_array(img)
        img_array = np.expand_dims(img_array, axis=0)
        img_array = mobilenet_v2.preprocess_input(img_array)

        # Make prediction
        preds = model.predict(img_array)
        decoded_preds = mobilenet_v2.decode_predictions(preds, top=1)[0]
        return decoded_preds[0][1], decoded_preds[0][2]  # Class name and confidence
    except Exception as e:
        return "error", str(e)

if __name__ == "__main__":
    img_path = sys.argv[1]  # Get image path from command-line argument
    class_name, confidence = validate_image(img_path)
    print(f"{class_name}:{confidence}")
