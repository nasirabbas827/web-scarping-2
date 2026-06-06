# Web_Scarping_2  

A lightweight, static HTML project that showcases assets scraped from Amazon toy product pages. The repository contains the original JavaScript, CSS, and image files retrieved during the scraping process, allowing developers to explore the structure of Amazon product pages and experiment with offline rendering.

---

## Overview  

`Web_Scarping_2` is a **demo collection** of resources captured from Amazon toy listings. It serves as a reference for:

- Understanding how Amazon structures its product pages (scripts, styles, and media).  
- Testing front‑end parsing or transformation tools without making live requests.  
- Building offline prototypes that mimic Amazon’s layout for educational purposes.

> **⚠️ Disclaimer** – The assets are for **educational and testing** use only. They must not be redistributed or used for commercial purposes without proper permission from Amazon.

---

## Features  

| Feature | Description |
|---------|-------------|
| **Complete asset set** | JavaScript (`*.js`), CSS (`*.css`), and image (`*.jpg`, `*.png`) files exactly as they were delivered by Amazon. |
| **Static HTML viewer** | A simple `index.html` page that loads the scraped assets, reproducing the original product page layout. |
| **Easy to extend** | Add your own HTML wrappers or scripts to experiment with DOM manipulation, data extraction, or UI redesign. |
| **Self‑contained** | No external dependencies – everything needed to render the page is stored locally. |

---

## Tech Stack  

| Layer | Technology |
|-------|------------|
| **Markup** | HTML5 |
| **Styling** | CSS3 (original Amazon styles) |
| **Behavior** | Vanilla JavaScript (original Amazon scripts) |
| **Assets** | JPEG & PNG images from Amazon product listings |

---

## Installation  

1. **Clone the repository**  

   ```bash
   git clone https://github.com/yourusername/Web_Scarping_2.git
   cd Web_Scarping_2
   ```

2. **(Optional) Serve locally** – Some browsers block loading of local scripts/styles. Use a simple HTTP server:

   ```bash
   # Python 3
   python -m http.server 8000
   # or Node.js
   npx serve .
   ```

   Then open `http://localhost:8000` in your browser.

3. **Open the page**  

   - Directly double‑click `index.html`, **or**  
   - Navigate to `http://localhost:8000/index.html` if you started a local server.

---

## Usage  

- **Explore the page** – The `index.html` file references the scraped assets, rendering a near‑identical Amazon toy product page.  
- **Inspect resources** – Use browser dev tools to view how the original scripts and styles interact.  
- **Experiment** – Replace or augment any of the assets (e.g., edit a `.js` file) to see how changes affect the page in real time.  

> **Tip:** If you plan to modify the JavaScript, consider disabling the original Amazon scripts by commenting them out in `index.html` to avoid conflicts.

---

## License  

This project is licensed under the **MIT License**. See the `LICENSE` file for full details.

---  

*Happy hacking!*