# proyectoFarmacia
git status     para ver los cambios
git add .       para añadir los cambio
git commit -m "comentario..."   
git push -u origin main     Con esto lo subo 

### **Para proyectos de tu hermano:**
```bash
# Clonar repositorios de tu hermano
git clone git@asaf:AsazelAm/su-repo.git

# Ya usará la configuración global (que es la de él)
```

### 2. Probar clonando un repo de tu hermano:
```bash
# Reemplaza con uno de sus repositorios
git clone git@asaf:AsazelAm/nombre-repo.git
```

## **Uso diario:**
- **Proyectos de tu hermano:** Usa `git@asaf:AsazelAm/repo.git`
- **Configuración por proyecto:** Solo ajusta `user.name` y `user.email` en tus projectos específicos

Excelente pregunta. Antes de hacer `git add`, `git commit` y `git push`, **SIEMPRE** debes verificar estas cosas:**Lo MÁS IMPORTANTE que debes verificar:**

## 🔴 **1. CONFIGURACIÓN DE USUARIO** (LO MÁS CRÍTICO)
```bash
git config user.name
git config user.email
```
Si no es correcta, TUS commits aparecerán como de tu hermano.

## 🔴 **2. QUÉ REPOSITORIO ESTÁS USANDO**
```bash
git remote -v
```
Debe mostrar `manases` para tus proyectos o `asaf` para los de él.

## 🔴 **3. QUÉ ARCHIVOS VAS A SUBIR**
```bash
git status
git diff
```

**Flujo recomendado:**
1. `git config user.email` (verificar usuario)
2. `git status` (ver qué cambió)
3. `git add archivo-específico.js` (NO uses `git add .`)
4. `git commit -m "Mensaje claro"`
5. `git push origin main`

¿En qué proyecto estás trabajando ahora? Te ayudo a verificar la configuración específica.