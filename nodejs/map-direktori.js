const fs = require('fs');
const path = require('path');

const excludedFolders = ['node_modules', '.git', '.devcontainer', 'dist', 'nodejs']; // Daftar folder yang akan dikecualikan
const excludedFiles = ['config.js', 'index.html']; // Daftar file yang akan dikecualikan

function isExcluded(name, excludedItems) {
  return excludedItems.includes(name);
}

function mapDirectory(directory, indent = '') {
  const files = fs.readdirSync(directory);

  files.forEach(file => {
    const filePath = path.join(directory, file);
    const stats = fs.statSync(filePath);

    if (stats.isDirectory()) {
      if (!isExcluded(file, excludedFolders)) {
        console.log(indent + file + '/');
        mapDirectory(filePath, indent + '  ');
      }
    } else {
      if (!isExcluded(file, excludedFiles)) {
        console.log(indent + file);
      }
    }
  });
}

// Mengganti direktori berikut dengan direktori yang ingin kamu peta
const directoryToMap = './';
mapDirectory(directoryToMap);
