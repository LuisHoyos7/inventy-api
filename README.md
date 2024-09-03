## INVENTY API

Sistema de inventarios y facturación electrónica

## 👓 Commits messages conventions

En Git, los mensajes de commit siguen ciertas convenciones para describir el propósito del cambio. Estas convenciones son especialmente útiles en proyectos grandes o colaborativos, ya que ayudan a mantener un historial de cambios claro y coherente. Aquí te explico qué significa cada uno de los tipos de commit que mencionas y cuándo usarlos, con ejemplos:

1. **build**: Cambios que afectan el sistema de construcción o dependencias externas (ej., npm, make).

    - **Cuándo usarlo**: Cuando agregas o cambias dependencias, actualizas scripts de build, o modificas archivos de configuración de la compilación.
    - **Ejemplo**:
        - `build: update webpack to version 5`
        - `build: add gulp task for deployment`

2. **chore**: Cambios que no afectan el código de producción ni los tests, como actualizaciones de herramientas o ajustes en la configuración.

    - **Cuándo usarlo**: Para tareas de mantenimiento rutinarias que no modifican el comportamiento del código.
    - **Ejemplo**:
        - `chore: update npm dependencies`
        - `chore: rename config files`

3. **ci**: Cambios en los archivos y scripts de configuración del servicio de CI (Integración Continua).

    - **Cuándo usarlo**: Cuando configuras o ajustas scripts relacionados con CI/CD (ej., GitHub Actions, Jenkins, Travis).
    - **Ejemplo**:
        - `ci: add GitHub Actions config for running tests`
        - `ci: update Travis CI configuration for node versions`

4. **docs**: Cambios que solo afectan la documentación.

    - **Cuándo usarlo**: Cuando agregas, actualizas o corriges documentación.
    - **Ejemplo**:
        - `docs: update README with new installation instructions`
        - `docs: fix typo in API documentation`

5. **feat**: Una nueva característica para el usuario.

    - **Cuándo usarlo**: Cuando implementas una nueva funcionalidad o característica en el código.
    - **Ejemplo**:
        - `feat: add user login functionality`
        - `feat: implement dark mode toggle`

6. **fix**: Solución a un bug.

    - **Cuándo usarlo**: Cuando corriges un error o bug en el código.
    - **Ejemplo**:
        - `fix: resolve issue with incorrect user permissions`
        - `fix: fix null pointer exception in data processing`

7. **perf**: Un cambio de código que mejora el rendimiento.

    - **Cuándo usarlo**: Cuando haces optimizaciones para mejorar la velocidad o eficiencia del código.
    - **Ejemplo**:
        - `perf: optimize image loading times`
        - `perf: reduce memory usage in data processing module`

8. **refactor**: Un cambio de código que no corrige un bug ni añade una característica, pero mejora la estructura del código.

    - **Cuándo usarlo**: Para reestructurar, limpiar o mejorar el código sin cambiar su comportamiento externo.
    - **Ejemplo**:
        - `refactor: reorganize folder structure`
        - `refactor: simplify data fetching logic`

9. **revert**: Reversión de un commit anterior.

    - **Cuándo usarlo**: Cuando necesitas deshacer los cambios de un commit anterior.
    - **Ejemplo**:
        - `revert: revert "feat: add user login functionality"`
        - `revert: revert commit 12345abc`

10. **style**: Cambios que no afectan el significado del código (espacios en blanco, formato, etc.).

-   **Cuándo usarlo**: Para cambios estéticos en el código, como corrección de indentaciones, espacios, o comas innecesarias.
-   **Ejemplo**:
    -   `style: fix indentation in main.js`
    -   `style: remove trailing whitespace in CSS files`

11. **test**: Añadir o corregir tests.

-   **Cuándo usarlo**: Cuando agregas, actualizas o corriges pruebas (tests) en el código.
-   **Ejemplo**:
    -   `test: add unit tests for authentication service`
    -   `test: fix broken integration tests for API`

Estos tipos de commits ayudan a mantener un historial claro y permiten a los colaboradores entender rápidamente qué tipo de cambio se realizó sin tener que revisar el código detalladamente.
