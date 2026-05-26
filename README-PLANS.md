# Comunicacao5 - Two Separate CakePHP 5 Applications

## Overview

Based on analysis of the original Comunicacao app and architectural best practices, we're building **TWO independent CakePHP 5 applications** instead of one monolithic app. This provides better separation of concerns, independent scaling, and cleaner code.

---

## Application 1: Comunicacao-Editorial

**Purpose:** Journalism workflow and content management  
**Users:** Editorial team (daily operators)  
**Nature:** Operational, high-activity, collaborative

### Core Modules
- **Pautas**: Editorial agendas/planning documents
- **Matérias**: Articles/content for publication
- **Tags**: Content categorization
- **Comments**: Internal discussions and observations

### Key Features
✅ Full editorial workflow (plan → write → publish)  
✅ File attachment support  
✅ Collaborative comments and observations  
✅ Tag-based organization  
✅ Archive and restore functionality  
✅ Target audience filtering (website vs newsletter)  
✅ Pagination and advanced search  

### Technology
- CakePHP 5.x
- PHP 8.1+
- MySQL 8.0+
- Bootstrap 5 UI
- Modern PSR-15 authentication

### Plan Location
📄 `PLAN-COMUNICACAO-EDITORIAL.md`

### Todos
- **45 tracked todos** with dependencies
- 12 implementation phases
- Covers: Setup → Auth → Models → CRUD → UI → Advanced Features → Security → Testing → Documentation

---

## Application 2: Comunicacao-Recursos

**Status:** 👑 100% CONCLUÍDO E ENTREGUE (2026-05-26)  
**Purpose:** Communications resource database and directory  
**Users:** Database managers/coordinators (periodic updates)  
**Nature:** Reference data, search/discovery, relatively static

### Core Modules
- **Ssindicais**: Union section directory with contact/link info
- **Históricos**: Historical tracking of section data

### Key Features
✅ Browse and search union sections  
✅ Multi-level filtering (region, state, sector)  
✅ Advanced filtering combinations  
✅ Historical records and tracking  
✅ Directory views (list, table, spreadsheet)  
✅ CSV export  
✅ Pagination and sorting  

### Technology
- CakePHP 5.x
- PHP 8.1+
- MySQL 8.0+
- Bootstrap 5 UI
- Modern PSR-15 authentication

### Plan Location
📄 `PLAN-COMUNICACAO-RECURSOS.md`

### Todos
- **40 tracked todos** with dependencies
- 12 implementation phases
- Covers: Setup → Auth → Models → CRUD → Filtering → Search → UI → Advanced Features → Security → Testing → Documentation

---

## Why Two Apps?

### ✅ Separation of Concerns
- Each app has a single, clear responsibility
- Editorial focus: workflow and publishing
- Recursos focus: discovery and reference

### ✅ Independent Lifecycle
- Deploy editorial updates without touching resources
- Different release cycles and timelines
- One failure doesn't affect the other

### ✅ Performance Optimization
- Editorial: Optimize for frequent reads/writes, real-time operations
- Recursos: Optimize for search, filtering, read-heavy

### ✅ Scalability
- Can deploy independently
- Can use different infrastructure if needed
- Clear resource boundaries

### ✅ Maintainability
- Smaller codebase per app (45 and 40 todos vs 80+ combined)
- Easier to understand and modify
- Clearer responsibilities

### ✅ User Experience
- Focused interfaces per workflow
- No UI clutter or confusing navigation
- Each app optimized for its users

---

## Shared Infrastructure (Keep DRY)

### Single User/Auth Database
- One `users` table shared between both apps
- Could use shared authentication microservice
- OR: Duplicate simple user auth in each app (if independent deployment preferred)

### Common Configuration
- Deployment scripts
- Development setup documentation
- CI/CD pipeline templates
- Code standards and conventions

### Potential Shared Packages
- Custom form/UI components
- Validation rules
- File handling utilities
- Common middleware

---

## Implementation Strategy

### Phase 1: Build Editorial App First
- Core operational system
- More complex (files, comments, workflow)
- Higher immediate ROI
- **Target: 45 todos** (organized in 12 phases)

### Phase 2: Build Resources App
- Simpler reference database
- Filtering and search focused
- Can reuse patterns from Editorial
- **Target: 40 todos** (organized in 12 phases)

### Phase 3: Integrate if Needed
- Once both are stable, could add:
  - Shared authentication service
  - Cross-app reporting
  - Unified deployment

---

## Quick Stats

| Aspect | Editorial | Recursos |
|--------|-----------|----------|
| **Purpose** | Workflow & Publishing | Reference & Discovery |
| **Tables** | 7 (users, pautas, materias, tags, materias_tags, comentapautas, observacoes) | 3 (users, ssindicais, historicos) |
| **CRUD Complexity** | High (relationships, files, comments) | Medium (mostly read-heavy) |
| **Todos** | 45 | 40 |
| **Key Feature** | File uploads & collaboration | Search & filtering |
| **User Type** | Daily operators | Periodic managers |
| **Build Time (estimate)** | Longer | Shorter |

---

## Next Steps

1. ✅ **Plans Created** - Detailed plans for both apps with phases and todos
2. ✅ **Review & Feedback** - Plan verified against legacy schema and approved (2026-05-26)
3. 🚀 **Start Implementation** - Build Editorial app first, then Resources app
4. 🧪 **Testing** - Each app tested independently
5. 📦 **Deployment** - Deploy each app independently

---

## File Structure in Session

```
/home/luis/.copilot/session-state/bf673851-c91f-4f2e-b678-265062a3c747/

├── README-PLANS.md (this file)
├── PLAN-COMUNICACAO-EDITORIAL.md (Editorial app plan - 45 todos)
├── PLAN-COMUNICACAO-RECURSOS.md (Recursos app plan - 40 todos)
├── PROJECT_DESCRIPTION.md (original project analysis)
└── plan.md (archived - combined plan)
```

---

## Todo Tracking

Both app plans have been reflected in the SQL database for tracking:

### Editorial Todos
- Prefix: `ed-`
- Example: `ed-setup-project`, `ed-auth-setup`, `ed-pautas-controller`
- 45 total todos with dependencies

### Recursos Todos
- Prefix: `rec-`
- Example: `rec-setup-project`, `rec-auth-setup`, `rec-ssindicais-controller`
- 40 total todos with dependencies

Query todos with: `SELECT * FROM todos WHERE status = 'pending' LIMIT 10`

---

## Questions Before Implementation?

Before we start building tomorrow, consider:

1. **Shared Auth?** Should both apps use the same user database, or independent?
2. **Deployment?** Same server or separate VPSs?
3. **Timeline?** Priority: Editorial first, or build in parallel?
4. **Features?** Any must-have features to prioritize?
5. **Testing?** Level of test coverage needed?

Feel free to suggest changes to the plans before we start! 🚀
