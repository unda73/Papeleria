const express = require('express');
const path = require('path');
const app = express();

// Servir los archivos estáticos (HTML, CSS, JS)
app.use(express.static(path.join(__dirname)));

// Puerto
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
  console.log(`Servidor corriendo en http://localhost:${PORT}`);
});