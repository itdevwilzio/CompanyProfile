// resources/js/three-wave.js

import * as THREE from 'three';

// Set up scene, camera, and renderer
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
const renderer = new THREE.WebGLRenderer();
renderer.setSize(window.innerWidth, window.innerHeight);
document.getElementById('three-canvas-container').appendChild(renderer.domElement);

// Create plane geometry for wave
const geometry = new THREE.PlaneGeometry(20, 20, 100, 100);
const material = new THREE.MeshBasicMaterial({ color: 0x0077ff, wireframe: true });
const plane = new THREE.Mesh(geometry, material);
scene.add(plane);

camera.position.z = 5;

// Animation variables
let waveOffset = 0;

function animate() {
    requestAnimationFrame(animate);

    // Update wave vertices
    geometry.vertices.forEach((vertex, i) => {
        const waveX1 = 0.5 * Math.sin(vertex.x * 2 + waveOffset);
        const waveY1 = 0.25 * Math.sin(vertex.y * 2 + waveOffset);
        vertex.z = waveX1 + waveY1;
    });

    waveOffset += 0.05;

    geometry.verticesNeedUpdate = true;

    renderer.render(scene, camera);
}

animate();
