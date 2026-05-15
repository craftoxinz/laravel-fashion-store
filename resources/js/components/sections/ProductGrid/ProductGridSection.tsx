import React from 'react';
import Section from '../../ui/section/Section';
import ProductCard from '../../ui/productcard/ProductCard'; // Import our new component
import styles from './ProductGridSection.module.css';

const products = [
    {
        id: 1,
        name: 'Raw Denim Jacket',
        price: 'Rp 1.200.000,00',
        image: '/images/products/jacket-1.png',
    },
    {
        id: 2,
        name: 'Essential White Tee',
        price: 'Rp 350.000,00',
        image: '/images/products/tee-1.png',
    },
];

export default function ProductGridSection() {
    return (
        <Section id="our-products">
            <h2 className={styles.sectionTitle}>Our Products</h2>

            <div className={styles.grid}>
                {products.map((product) => (
                    /* Using the shared component now */
                    <ProductCard key={product.id} product={product} />
                ))}
            </div>

            <div className={styles.footer}>
                <a href="/shop" className={styles.browseLink}>
                    Browse More
                </a>
            </div>
        </Section>
    );
}
