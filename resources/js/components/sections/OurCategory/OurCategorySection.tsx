import React from 'react';
import Section from '../../ui/section/Section';
import styles from './OurCategorySection.module.css';

// Placeholder array
const categories = [
    {
        id: 'jackets',
        name: 'Jackets',
        image: '/images/categories/jackets.png',
        link: '/shop/jackets',
    },
    {
        id: 'shirts',
        name: 'Shirts',
        image: '/images/categories/shirts.png',
        link: '/shop/shirts',
    },
    {
        id: 'pants',
        name: 'Pants',
        image: '/images/categories/pants.png',
        link: '/shop/pants',
    },
];

export default function CategorySection() {
    return (
        <Section id="categories">
            <h2 className={styles.sectionTitle}>Categories</h2>

            <div className={styles.grid}>
                {categories.map((cat) => (
                    <a key={cat.id} href={cat.link} className={styles.card}>
                        <div
                            className={styles.image}
                            style={{ backgroundImage: `url(${cat.image})` }}
                        >
                            <div className={styles.overlay}>
                                <h3 className={styles.categoryName}>
                                    {cat.name}
                                </h3>
                                <span className={styles.explore}>Explore</span>
                            </div>
                        </div>
                    </a>
                ))}
            </div>
        </Section>
    );
}
